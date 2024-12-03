<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Just a friendly reminder about your upcoming virtual SWAHB appointment.</p>

<h3>Appointment Details:</h3>
<ul>
    <li><strong>Date:</strong> {{ $appointment_date }}</li>
    <li><strong>Time:</strong> {{ $appointment_time }}</li>
</ul>

<p>Let's make this call count!</p>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Best,<br>The Frootify Team</p>
</body>
</html>
