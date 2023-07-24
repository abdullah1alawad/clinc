<!DOCTYPE html>
<html>
<head>
    <title>Multi-page Layout</title>
    <style>
        section {
            height: 100vh;
            display: none;
        }
        section:first-of-type {
            display: block;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-content: center;
        }

        nav li {
            margin: 0 10px;
        }

        nav a {
            display: block;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 5px;
            transition: all 0.2s ease-in-out;
        }

        nav a:hover,
        nav li.active a {
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="#section1">Section 1</a></li>
        <li><a href="#section2">Section 2</a></li>
        <li><a href="#section3">Section 3</a></li>
    </ul>
</nav>
<section id="section1">
    <p>Section 1</p>
</section>
<section id="section2">
    <p>Section 2</p>
</section>
<section id="section3">
    <p>Section 3</p>
</section>
<script>
    // Get all the navigation links
    const links = document.querySelectorAll('nav a');

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
</script>
</body>
</html>
