// Get the tabs and tab content elements
const aboutTab = document.getElementById("home-tab");
const timelineTab = document.getElementById("profile-tab");
const aboutContent = document.getElementById("home");
const timelineContent = document.getElementById("profile");

// Add event listeners to the tabs
aboutTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    aboutContent.classList.add("show", "active");
    timelineContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    timelineTab.classList.remove("active");
});

timelineTab.addEventListener("click", () => {
    // Show the "Timeline" tab content and hide the "About" tab content
    timelineContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    // Update the active class of the tabs
    timelineTab.classList.add("active");
    aboutTab.classList.remove("active");
});
