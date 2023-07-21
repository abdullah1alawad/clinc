@extends('layouts.student')

@section('content')

    <div class="container emp-profile">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            Kshiti Ghelani
                        </h5>
                        <h6>
                            Web Developer and Designer
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false">Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
{{--                        keep it empty        --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row py-1">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="Kshiti Ghelani">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="kshitighelani@gmail.com">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" value="123 456 7890">
                                </div>
                            </div>
                            <div class="row py-1">
                                <div class="col-md-6">
                                    <label>National_id</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="national_id" value="123 456 7890">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio-container">
                                        <input type="radio" id="male" name="gender" value="0">
                                        <label for="male">Male</label>
                                    </div>

                                    <div class="radio-container">
                                        <input type="radio" id="female" name="gender" value="1">
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label>Old Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="oldpassword">
                                    {{--                                    <p>Expert</p>--}}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label>New Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="newpassword">
                                    {{--                                    <p>10$/hr</p>--}}
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label>Confirm Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="confirmpassword">
                                    {{--                                    <p>230</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center py-4">
                <div class="col-md-5 text-center">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>
            </div>

        </form>
    </div>

@endsection

