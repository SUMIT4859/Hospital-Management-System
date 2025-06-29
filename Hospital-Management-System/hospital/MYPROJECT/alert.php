html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .book-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Book Your Appointment</h2>
    <button class="book-btn" onclick="bookAppointment()">Book Now</button>

    <script>
        function bookAppointment() {
            // Logic to book the appointment (e.g., form submission, database update, etc.)
            
            // After successfully booking the appointment, show the alert
            alert("You have successfully booked your appointment!");
        }
    </script>
</body>
</html>

