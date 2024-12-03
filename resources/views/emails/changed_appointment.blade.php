<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Dear {{ $username }},</p>
<p>We're writing to inform you of a change to your upcoming appointment.</p>

<h3>Original Appointment:</h3>
<ul>
    <li><strong>Date:</strong> {{ $original_date }}</li>
    <li><strong>Time:</strong> {{ $original_time }}</li>
</ul>

<h3>New Appointment:</h3>
<ul>
    <li><strong>Date:</strong> {{ $new_date }}</li>
    <li><strong>Time:</strong> {{ $new_time }}</li>
</ul>

@if (!empty($reason))
    <h3>Reason for Change:</h3>
    <p>{{ $reason }}</p>
@endif

<p>We apologize for any inconvenience this may cause. We appreciate your understanding. If you have any questions or concerns, please contact our customer support team:</p>
<ul>
    <li><strong>Phone:</strong> {{ $phone_number }}</li>
    <li><strong>Email:</strong> {{ $email_address }}</li>
</ul>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Sincerely,<br>The Frootify Team</p>
</body>
</html>
