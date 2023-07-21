
///////////////////////////////// tabs code  //////////////////////////////////////////////////////////////////////////////////////////
// Get the tabs and tab content elements
const aboutTab = document.getElementById("about-tab");
const upcomingAppointmentsTab = document.getElementById("upcomingAppointments-tab");
const completedAppointmentsTab = document.getElementById("completedAppointments-tab");
const aboutContent = document.getElementById("about");
const upcomingAppointmentsContent = document.getElementById("upcomingAppointments");
const completedAppointmentsContent = document.getElementById("completedAppointments");

// Add event listeners to the tabs
aboutTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    aboutContent.classList.add("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    upcomingAppointmentsTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
});

upcomingAppointmentsTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    upcomingAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    completedAppointmentsContent.classList.remove("show", "active");
    // Update the active class of the tabs
    upcomingAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    completedAppointmentsTab.classList.remove("active");
});

completedAppointmentsTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    completedAppointmentsContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    upcomingAppointmentsContent.classList.remove("show", "active");
    // Update the active class of the tabs
    completedAppointmentsTab.classList.add("active");
    aboutTab.classList.remove("active");
    upcomingAppointmentsTab.classList.remove("active");
});
/////////////////////////////////////////end tabs code //////////////////////////////////////////////////////////////
import $ from 'jquery';

$(document).ready(function() {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
