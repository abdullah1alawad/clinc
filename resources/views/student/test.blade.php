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
<form action="{{route('patient.test')}}" method="post">
    @csrf
    <div class="new-disease">
        {{--the new disease will appended here--}}
    </div>
    <input type="submit" value="go">
</form>

<input type="text" name="new_disease" placeholder="Add other disease"
       style="margin-bottom: 5px">
<button type="button" onclick="addDisease()">Add</button>


<script>
    // Get all the navigation links
    const links = document.querySelectorAll('nav a');

    function addDisease() {
        let input = document.getElementsByName('new_disease')[0];
        let div = document.getElementsByClassName('new-disease')[0];
        let newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'other_diseases[]';
        newInput.value = input.value;
        newInput.style = "margin-bottom: 5px";
        div.appendChild(newInput);
        input.value = '';
    }
</script>
</body>
</html>
