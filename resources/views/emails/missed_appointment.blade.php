<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Dear {{ $username }},</p>
<p>We wanted to follow up on your missed appointment on {{ $date }} at {{ $time }}.</p>
<p>We understand that things can come up, but we hope you'll be able to reschedule soon.</p>

<p>If you'd like to reschedule, please contact us at:</p>
<ul>
    <li><strong>Phone:</strong> {{ $phone_number }}</li>
    <li><strong>Email:</strong> {{ $email_address }}</li>
</ul>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Thank you for your understanding.</p>
<p>Sincerely,<br>The Frootify Team</p>
</body>
</html>
