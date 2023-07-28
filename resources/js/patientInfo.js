// Get all the navigation links
const links = document.querySelectorAll('.patient-class nav a');

// Loop through each link and add a click event listener
links.forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault(); // Prevent default link behavior

        // Get the target section ID from the link href attribute
        const targetId = link.getAttribute('href');

        // Hide all sections except the target section
        document.querySelectorAll('section').forEach(section => {
            if (section.getAttribute('id') === targetId.substring(1)) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });

        // Set the active class on the clicked link
        document.querySelectorAll('nav a').forEach(link => {
            link.classList.remove('active');
        });
        link.classList.add('active');
    });
});
