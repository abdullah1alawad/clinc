<!DOCTYPE html>
<html>
<head>
    <title>Booking Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar {
            display: inline-block;
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        .calendar th {
            background-color: #f2f2f2;
        }
        .calendar td.booked {
            background-color: #f44336;
            color: #fff;
            cursor: not-allowed;
        }
        .calendar td.available {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Select a Date and Time Slot:</h2>
<table class="calendar">
    <thead>
    <tr>
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
    </tr>
    </thead>
    <tbody id="calendar-body">
    <!-- Calendar cells will be generated here -->
    </tbody>
</table>

<script>
    // Example: Booked dates and hours (in real-world, this data should come from the backend)
    const bookedDatesAndHours = {
        "2023-07-30": ["12:00 PM", "2:00 PM", "4:00 PM"],
        "2023-07-31": ["10:00 AM", "1:00 PM"],
        "2023-08-01": ["3:00 PM"],
    };

    // Function to generate the calendar cells and available time slots
    function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const calendarBody = document.getElementById("calendar-body");
        calendarBody.innerHTML = "";

        let currentDate = new Date(firstDay);
        while (currentDate <= lastDay) {
            const row = document.createElement("tr");
            for (let i = 0; i < 7; i++) {
                const cell = document.createElement("td");
                if (currentDate.getMonth() === month) {
                    const dateString = currentDate.toISOString().split("T")[0];
                    cell.textContent = currentDate.getDate();

                    // Check if the date is booked
                    if (bookedDatesAndHours[dateString]) {
                        cell.classList.add("booked");
                    } else {
                        cell.classList.add("available");
                        cell.addEventListener("click", function() {
                            bookTimeSlot(dateString);
                        });
                    }
                }
                row.appendChild(cell);
                currentDate.setDate(currentDate.getDate() + 1);
            }
            calendarBody.appendChild(row);
        }
    }

    // Function to handle booking a time slot
    function bookTimeSlot(dateString) {
        const selectedDate = new Date(dateString);
        const timeSlots = bookedDatesAndHours[dateString];

        if (!timeSlots || timeSlots.length === 0) {
            alert("No available time slots for the selected date.");
            return;
        }

        const selectedTimeSlot = prompt("Available Time Slots:\n" + timeSlots.join("\n"));

        if (!selectedTimeSlot || !timeSlots.includes(selectedTimeSlot)) {
            alert("Invalid or unavailable time slot selected.");
            return;
        }

        // In a real-world scenario, you'd make an API call to the backend to book the slot.
        alert("Time slot successfully booked:\nDate: " + dateString + "\nTime: " + selectedTimeSlot);
    }

    // Call the function to generate the calendar for July 2023 (month: 6 since months are zero-indexed)
    generateCalendar(2023, 6);
</script>
</body>
</html>
