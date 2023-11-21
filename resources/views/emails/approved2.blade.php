<!DOCTYPE html>
<html>
<head>
    <title>Your Application is Accepted</title>
</head>
<body>


    @if($applicant->status === 1)

        <h2>Your Application has been Accepted!</h2>
        <p>
             Hello There, {{ $applicant->first_name." ".$applicant->last_name }},
        </p>

        <p>
        Congratulations! Your application has been successfully accepted.
        We are excited to proceed with the processing of your passport. Below are the details:
        </p>

        <ul>
        <li><strong>Name:</strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</li>
        <li><strong>Email:</strong> {{ $applicant->email }}</li>
        <li><strong>Application Number:</strong> {{ $applicant->app_no }}</li>
        </ul>


    @else


        <h2>Your Application has been Rejected!!</h2>
        <p>
            Hello There, {{ $applicant->first_name." ".$applicant->last_name }},
        </p>

        <p>
        We regret to inform you that your application has been rejected.
        Insufficient information or unclear documents might be the reason.
        Please consider reapplying with the correct information and documents.
        </p>

        <ul>
        <li><strong>Name:</strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</li>
        <li><strong>Email:</strong> {{ $applicant->email }}</li>
        <li><strong>Application Number:</strong> {{ $applicant->app_no }}</li>
        </ul>

    @endif
    <p>
        Thank you for choosing our service.
    </p>
</body>
</html>