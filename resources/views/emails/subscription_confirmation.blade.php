<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hi {{ $username }},</p>
<p>Your {{ $number_of_days }}-day Health Buddy subscription is now active! You can now access personalized health advice, track your progress, and connect with a dedicated health coach.</p>

<h3>To see your personalized schedule and get started:</h3>
<ul>
    <li>Log in to your account.</li>
    <li>Check your dashboard for your upcoming appointments.</li>
</ul>

<p>We're here to support you on your journey to better health.</p>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Best regards,<br>The Frootify Team</p>
</body>
</html>
