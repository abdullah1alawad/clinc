<?php

namespace App\Http\Controllers;

use App\Notifications\NewProcessNotification;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhotoRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreExistingAdminRequest;
use App\Http\Requests\StoreNewAdminRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Process;

use App\Models\Role;
use App\Models\Subprocess_mark;
use App\Models\Subject;
use App\Models\User;
use App\Traits\GlobalFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use GlobalFunctions;

    public function banned()
    {
        $user = Auth::user();
        return view('banned', compact('user'));
    }

    public function pending()
    {
        $user = Auth::user();
        return view('pending', compact('user'));
    }

    /////////////////////////////////////////////////////////////////////////


    //////////////////////////////////////// admin section ///////////////////////////////////////////////////

    public function adminProfile(Request $request)
    {
        $user = auth()->user();

        if ($request->has('unread') && $request->input('unread') === '1')
            $messages = $user->unreadNotifications()->where('type', NewUserNotification::class)->paginate(5)->fragment('messages');
        else
            $messages = $user->notifications()->where('type', NewUserNotification::class)->paginate(5)->fragment('messages');

        $unreadNotificationsCount = $user->unreadNotifications()->where('type', NewUserNotification::class)->count();


        return view('admin.profile', compact('user', 'messages', 'unreadNotificationsCount'));
    }

    public function adminProfileEdit()
    {
        $user = auth()->user();

        return view('admin.editProfile', compact('user'));
    }

    public function adminProfileUpdate(UpdateRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->national_id = $request->input('national_id');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect()->route('admin.edit.profile')
            ->with('success', 'Your Profile Has Been Updated Successfully!');

    }

    public function adminChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        $user->password = Hash::make($request->input('newPassword'));

        $user->save();

        return redirect()->route('admin.edit.profile')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function addAdmin()
    {
        $user = auth()->user();
        return view('admin.addAdmin', compact('user'));
    }

    public function storeExistingAdmin(StoreExistingAdminRequest $request)
    {
        $user = User::where('national_id', $request->input('national_id'))->first();

        if (!$user)
            return redirect()->route('add.admin')
                ->with('field', 'User Not Found');

        $roles = $user->roles;

        if ($roles[0]->name == "admin")
            return redirect()->route('add.admin')
                ->with('field', 'User Already Admin');

        $user->roles()->attach(1);

        return redirect()->route('add.admin')
            ->with('success', 'Admin Has Been Added Successfully!');
    }

    public function storeNewAdmin(StoreNewAdminRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'national_id' => $request->input('national_id'),
            'gender' => $request->input('gender'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->roles()->attach(1);

        return redirect()->route('add.admin')
            ->with('success', 'Admin Has Been Added Successfully!');
    }

    public function adminShowMessage($msg_id)
    {

        $msg = auth()->user()->notifications()->find($msg_id);

        if (!$msg)
            abort('404');

        $user = User::find($msg->data['user_id']);
        $msg->markAsRead();

        return view('admin.show-message', compact('user', 'msg'));
    }

    public function adminMarkNotification(Request $request)
    {

        if ($request->has('id'))
            auth()->user()->notifications()->find($request->input('id'))->markAsRead();
        else
            auth()->user()->notifications()->where('type', NewUserNotification::class)->get()->markAsRead();


        return response()->noContent();
    }

    public function userAccept($id, $type)
    {
        $user = User::find($id);

        if ($type == 'Doctor')
            $user->roles()->sync(3);
        else
            $user->roles()->sync(4);

        return redirect()->back()->with('success', $type . ' Has Been Accepted!');
    }

    public function userReject($id, $type)
    {
        $user = User::find($id);

        $user->roles()->sync(6);

        return redirect()->back()->with('success', $type . ' Has Been Banned!');
    }

    //////////////////////////////////////// end admin section ///////////////////////////////////////////////////

    //////////////////////////////////////// student section ////////////////////////////////////////////////
    public function studentProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();


        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->studentProcesses()->where('date', '>=', $current_time)->where('status', 1)->get();

        if ($selected_subject) {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        }

        $studentMarks = $user->studentMarks()->paginate(5)->fragment('subjectsMark');

        if ($request->has('unread') && $request->input('unread') === '1')
            $messages = $user->unreadNotifications()->paginate(5)->fragment('messages');
        else
            $messages = $user->notifications()->paginate(5)->fragment('messages');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($studentMarks as $mark) {
            $subject_name = $mark->subject->name;

            $mark->subject_name = $subject_name;
        }

        return view('student.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'studentMarks', 'messages'));
    }

    public function showSubprocessMark($process_id)
    {
        $process = Process::find($process_id);
        $process_mark = $process->marks;

        $total_mark = 0;
        foreach ($process_mark as $mark)
            $total_mark += $mark->mark;
        $process_mark->total_mark = $total_mark;

        return view('student.showSubprocessMark', compact('process_mark'));
    }

    public function studentProfileEdit()
    {
        $user = auth()->user();

        return view('student.editProfile', compact('user'));
    }

    public function studentProfileUpdate(UpdateRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->national_id = $request->input('national_id');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Profile Has Been Updated Successfully!');

    }

    public function studentChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        $user->password = Hash::make($request->input('newPassword'));

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function studentChangePhoto(ChangePhotoRequest $request)
    {
        $user = auth()->user();


        $photoBath = saveImage($request->file('photo'), 'images');

        $user->photo = $photoBath;

        $user->save();

        return redirect()->route('student.edit.profile')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }

    public function studentMarkNotification(Request $request)
    {
        if ($request->has('id'))
            auth()->user()->notifications()->find($request->input('id'))->markAsRead();
        else
            auth()->user()->notifications()->get()->markAsRead();


        return response()->noContent();
    }

    public function studentShowMessage($message_id)
    {
        $message = auth()->user()->notifications()->find($message_id);

        if (!$message)
            abort('404');

        $message->markAsRead();

        return view('student.show-message', compact('message'));
    }

    //////////////////////////////////////// end student section /////////////////////////////////////////////

    /////////////////////////////////////// doctor section //////////////////////////////////////////////////
    public function doctorProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->doctorProcesses()->where('date', '>=', $current_time)->where('status', 1)->get();

        if ($selected_subject) {
            $completedAppointments = $user->doctorProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->doctorProcesses()->where('date', '<', $current_time)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        }

        if ($request->has('unread') && $request->input('unread') === '1')
            $messages = $user->unreadNotifications()->where('type', NewProcessNotification::class)->paginate(5)->fragment('messages');
        else
            $messages = $user->notifications()->where('type', NewProcessNotification::class)->paginate(5)->fragment('messages');

        $unreadNotificationsCount = $user->unreadNotifications()->where('type', NewProcessNotification::class)->count();

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }


        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        return view('doctor.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'messages', 'unreadNotificationsCount'));
    }

    public function doctorProfileEdit()
    {
        $user = auth()->user();

        return view('doctor.edit-profile', compact('user'));
    }

    public function doctorProfileUpdate(UpdateRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->national_id = $request->input('national_id');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');

        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Profile Has Been Updated Successfully!');
    }

    public function doctorChangePhoto(ChangePhotoRequest $request)
    {
        $user = auth()->user();

        if ($request->hasFile('photo')) {
            $url = saveImage($request->file('photo'), 'images');
            $user->photo = $url;
        }
        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }

    public function doctorChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        $user->password = Hash::make($request->input('newPassword'));

        $user->save();
        return redirect()->route('doctor.profile.edit')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function doctorMarkNotification(Request $request)
    {

        if ($request->has('id'))
            auth()->user()->notifications()->find($request->input('id'))->markAsRead();
        else
            auth()->user()->notifications()->where('type', NewProcessNotification::class)->get()->markAsRead();


        return response()->noContent();
    }

    public function doctorShowMessage($msg_id)
    {

        $message = auth()->user()->notifications()->find($msg_id);
        $assistants = User::whereHas('roles', function ($q) {
            $q->where('name', 'assistant');
        })->get();

        if (!$message)
            abort('404');

        $message->markAsRead();

        return view('doctor.show-message', compact('message', 'assistants'));
    }


    public function searchStudentPage()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->paginate(5)->fragment('users');
        return view('search-student', compact('users'));
    }

    public function searchStudent(SearchRequest $request)
    {
        $national_id = $request->national_id;

        if ($national_id) {
            // Search query is present, perform the search
            $users = User::where('national_id', 'LIKE', '%' . $national_id . '%')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'student');
                })
                ->paginate(5)
                ->appends(['national_id' => $national_id]);
        } else {
            // No search query, show all users with student role
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
                ->paginate(5)
                ->fragment('users');
        }

        return view('search-student', compact('users'));
    }


    public function showStudent($id, Request $request)
    {
        $user = User::find($id);
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->studentProcesses()->where('date', '>=', $current_time)->where('status', 1)->get();

        if ($selected_subject) {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        $studentMarks = $user->studentMarks()->paginate(5)->fragment('subjectsMark');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->student_name = $student_name;
            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($studentMarks as $mark) {
            $subject_name = $mark->subject->name;

            $mark->subject_name = $subject_name;
        }

        return view('show-student', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'studentMarks'));
    }

    public function showDoctorNotifications()
    {
        $doctor = Auth::user();
        $notifications = $doctor->notifications;
        dd($notifications);
    }

    ///////////////////////////////////// end doctor section /////////////////////////////////////////////


    /////////////////////////////////////// assistant section //////////////////////////////////////////////////
    public function assistantProfile(Request $request)
    {
        $user = auth()->user();
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->assistantProcesses()->where('date', '>=', $current_time)->where('status', 1)->get();

        if ($selected_subject) {
            $completedAppointments = $user->assistantProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->assistantProcesses()->where('date', '<', $current_time)->where('status', 1)->paginate(5)->fragment('completedAppointments');
        }

        if ($request->has('unread') && $request->input('unread') === '1')
            $messages = $user->unreadNotifications()->paginate(5)->fragment('messages');
        else
            $messages = $user->notifications()->paginate(5)->fragment('messages');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $doctor_name = $appointment->doctor->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }


        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);

            $student_name = $appointment->student->name;
            $patient_name = $appointment->patient->name;
            $doctor_name = $appointment->doctor->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->patient_name = $patient_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        return view('assistant.profile', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'messages'));
    }

    public function assistantProfileEdit()
    {
        $user = auth()->user();

        return view('assistant.edit-profile', compact('user'));
    }

    public function assistantProfileUpdate(UpdateRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->national_id = $request->input('national_id');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');

        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Profile Has Been Updated Successfully!');
    }

    public function assistantChangePhoto(ChangePhotoRequest $request)
    {
        $user = auth()->user();

        if ($request->hasFile('photo')) {
            $url = saveImage($request->file('photo'), 'images');
            $user->photo = $url;
        }
        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Profile Photo Has Been Updated Successfully!');
    }

    public function assistantChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();

        $user->password = Hash::make($request->input('newPassword'));

        $user->save();
        return redirect()->route('assistant.profile.edit')
            ->with('success', 'Your Password Has Been Updated Successfully!');
    }

    public function assistantMarkNotification(Request $request)
    {

        if ($request->has('id'))
            auth()->user()->notifications()->find($request->input('id'))->markAsRead();
        else
            auth()->user()->notifications()->get()->markAsRead();


        return response()->noContent();
    }

    public function assistantShowMessage($msg_id)
    {

        $message = auth()->user()->notifications()->find($msg_id);

        if (!$message)
            abort('404');

        $message->markAsRead();

        return view('assistant.show-message', compact('message'));
    }

    ///////////////////////////////////// end assistant section /////////////////////////////////////////////

    /////////////////////////////////////search here for now /////////////////////////////////////
    public function searchAssistantPage()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'assistant');
        })->paginate(5)->fragment('users');
        return view('search-assistant', compact('users'));
    }

    public function searchAssistant(SearchRequest $request)
    {
        $national_id = $request->national_id;

        if ($national_id) {
            // Search query is present, perform the search
            $users = User::where('national_id', 'LIKE', '%' . $national_id . '%')
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'assistant');
                })
                ->paginate(5)
                ->appends(['national_id' => $national_id]);
        } else {
            // No search query, show all users with student role
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'assistant');
            })
                ->paginate(5)
                ->fragment('users');
        }

        return view('search-assistant', compact('users'));
    }


    public function showAssistant($id, Request $request)
    {
        $user = User::find($id);
        $subjects = Subject::all();

        $selected_subject = $request->query('subject');
        $current_time = Carbon::now();
        $upcomingAppointments = $user->studentProcesses()->where('date', '>=', $current_time)->where('status', 1)->get();

        if ($selected_subject) {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->where('subject_id', $selected_subject)->paginate(5)->fragment('completedAppointments');
        } else {
            $completedAppointments = $user->studentProcesses()->where('date', '<', $current_time)->paginate(5)->fragment('completedAppointments');
        }

        $studentMarks = $user->studentMarks()->paginate(5)->fragment('subjectsMark');

        foreach ($upcomingAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->time_difference = $time_difference;
            $appointment->student_name = $student_name;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($completedAppointments as $appointment) {

            $date_from_database = Carbon::parse($appointment->date);
            $time_difference = $current_time->diffForHumans($date_from_database);
            $student_name = $appointment->student->name;
            $doctor_name = $appointment->doctor->name;
            $patient_name = $appointment->patient->name;
            $assistant_name = $appointment->assistant->name;
            $subject_name = $appointment->subject->name;

            $appointment->student_name = $student_name;
            $appointment->time_difference = $time_difference;
            $appointment->doctor_name = $doctor_name;
            $appointment->patient_name = $patient_name;
            $appointment->assistant_name = $assistant_name;
            $appointment->subject_name = $subject_name;
            $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        }

        foreach ($studentMarks as $mark) {
            $subject_name = $mark->subject->name;

            $mark->subject_name = $subject_name;
        }

        return view('show-assistant', compact('user', 'upcomingAppointments', 'completedAppointments', 'subjects', 'studentMarks'));
    }

}

