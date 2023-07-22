const aboutTab = document.getElementById("about-tab");
const changePasswordTab = document.getElementById("changePassword-tab");

const aboutContent = document.getElementById("about");
const changePasswordContent = document.getElementById("changePassword");


aboutTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    aboutContent.classList.add("show", "active");
    changePasswordContent.classList.remove("show", "active");

    // Update the active class of the tabs
    aboutTab.classList.add("active");
    changePasswordTab.classList.remove("active");
});

changePasswordTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    changePasswordContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");

    // Update the active class of the tabs
    changePasswordTab.classList.add("active");
    aboutTab.classList.remove("active");
});

/////////////////


let fragment = window.location.hash.substr(1);

if(fragment === '' || fragment === 'about'){
    aboutContent.classList.add("show", "active");
    changePasswordContent.classList.remove("show", "active");

    // Update the active class of the tabs
    aboutTab.classList.add("active");
    changePasswordTab.classList.remove("active");
}
else if(fragment === 'changePassword') {
    changePasswordContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");

    // Update the active class of the tabs
    changePasswordTab.classList.add("active");
    aboutTab.classList.remove("active");
}
