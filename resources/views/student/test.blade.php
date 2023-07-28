<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .notification.read {
            opacity: 0.5;
        }
    </style>
</head>
<body>

<div class="notification">
    <span class="message">This is a notification.</span>
    <a href="#" class="mark-as-read">Mark as Read</a>
</div>


<script>
    let markAsReadLinks = document.querySelectorAll('.mark-as-read');
    markAsReadLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            let notification = event.target.closest('.notification');
            notification.classList.add('read');
        });
    });
</script>
</body>
</html>
