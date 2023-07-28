
///////////////////////////////// tabs code  //////////////////////////////////////////////////////////////////////////////////////////
// Get the tabs and tab content elements
const aboutTab = document.getElementById("about-tab");
const messagesTab = document.getElementById("messages-tab");

const aboutContent = document.getElementById("about");
const messagesContent = document.getElementById("messages");

// Add event listeners to the tabs
aboutTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    aboutContent.classList.add("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    messagesTab.classList.remove("active");
});


messagesTab.addEventListener("click", () => {
    // Show the "About" tab content and hide the "Timeline" tab content
    messagesContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    aboutTab.classList.remove("active");
});
/////////////////////////////////////////end tabs code //////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////

const urlParams = new URLSearchParams(window.location.search);
const messages = urlParams.get('unread');

if(messages !== null){
    messagesContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    aboutTab.classList.remove("active");

    let btn = document.getElementById('msg_btn');
    let input = document.getElementsByName('unread')[0];

    if(messages === '1'){
        btn.innerHTML = 'All messages';
        input.value = '0';
    }
    else {
        btn.innerHTML = 'Unread Messages Only';
        input.value = '1';
    }
}

///////////////////////////// /////////////////////////////

//////////////////////////////////////////////////////
let fragment = window.location.hash.substr(1);

if((fragment === '' && messages === null)|| fragment === 'about'){
    aboutContent.classList.add("show", "active");
    messagesContent.classList.remove("show", "active");
    // Update the active class of the tabs
    aboutTab.classList.add("active");
    messagesTab.classList.remove("active");
}
else if(fragment === 'messages'){
    messagesContent.classList.add("show", "active");
    aboutContent.classList.remove("show", "active");
    // Update the active class of the tabs
    messagesTab.classList.add("active");
    aboutTab.classList.remove("active");
}

///////////////////////////////////////////////////////////////////////

