<!DOCTYPE html>
<html>
<head>
    <title>Your Appointment is Approved</title>
</head>
<body>
    <h2>Your appointment has been approved!</h2>
    <p>
        Hello {{ $appointment->name }},
    </p>
    <p>
        We are pleased to inform you that your appointment has been approved.
        Details:
        Name: {{ $appointment->name }}
        Email: {{ $appointment->email }}
        Date: {{ $appointment->date }}
        ...
        <!-- Include other details as needed -->
    </p>
    <p>
        Thank you for choosing our service.
    </p>
</body>
</html>