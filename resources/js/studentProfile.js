
///////////////////////////////// tabs code  //////////////////////////////////////////////////////////////////////////////////////////
// Get the tabs and tab content elements
const aboutTab = document.getElementById("about-tab");
const upcomingAppointmentsTab = document.getElementById("upcomingAppointments-tab");
const completedAppointmentsTab = document.getElementById("completedAppointments-tab");
const subjectsMarkTab = document.getElementById("subjectsMark-tab");
const messagesTab = document.getElementById("messages-tab");

const aboutContent = document.getElementById("about");
const upcomingAppointmentsContent = document.getElementById("upcomingAppointments");
const completedAppointmentsContent = document.getElementById("completedAppointments");
const subjectsMarkContent = document.getElementById("subjectsMark");
const messagesContent = document.getElementById("messages");

// Add event listeners to the tabs
aboutTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    aboutContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
});

upcomingAppointmentsTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    upcomingAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    upcomingAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
});

completedAppointmentsTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    completedAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    completedAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    upcomingAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
});

subjectsMarkTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    subjectsMarkContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    aboutContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    subjectsMarkTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    aboutTab.classList.remove("active");
    messagesTab.classList.remove("active");
});

messagesTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    messagesContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    aboutContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    aboutTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
});
/////////////////////////////////////////end tabs code //////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////
import $ from 'jquery';

$(document).ready(function() {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});


///////////////////////////// /////////////////////////////

const urlParams = new URLSearchParams(window.location.search);
const subject = urlParams.get('subject');
const messages = urlParams.get('unread');

if(subject !== null){
    completedAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    completedAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    upcomingAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
}

if (messages !== null) {
    messagesContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    aboutContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    aboutTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");

    let btn = document.getElementById('msg_btn');
    let input = document.getElementsByName('unread')[0];

    if (messages === '1') {
        btn.innerHTML = 'All messages';
        input.value = '0';
    } else {
        btn.innerHTML = 'Unread Messages Only';
        input.value = '1';
    }
}

//////////////////////////////////////////////////////
let fragment = window.location.hash.substr(1);

if((fragment === '' && subject === null && messages === null )|| fragment === 'about'){
    aboutContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
}
else if(fragment === 'upcomingAppointments') {
    upcomingAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    upcomingAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
}
else if(fragment === 'completedAppointments') {
    completedAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    completedAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    upcomingAppointmentsTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
    messagesTab.classList.remove("active");
}
else if(fragment === 'subjectsMark'){
    subjectsMarkContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    aboutContent.classList.remove("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    subjectsMarkTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    aboutTab.classList.remove("active");
    messagesTab.classList.remove("active");
}
else if(fragment === 'messages'){
    messagesContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    aboutContent.classList.remove("show", "active");
    subjectsMarkContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
    aboutTab.classList.remove("active");
    subjectsMarkTab.classList.remove("active");
}

///////////////////////////////////////////////////////////////////////

