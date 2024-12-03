<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Dear {{ $username }},</p>
<p>We're writing to inform you that your SWAHB subscription has been canceled.</p>

@if (!empty($reason))
    <h3>Reason for Cancellation:</h3>
    <p>{{ $reason }}</p>
@endif

<p>If you have any questions or need further assistance, please contact our customer support team:</p>
<ul>
    <li><strong>Phone:</strong> {{ $phone_number }}</li>
    <li><strong>Email:</strong> {{ $email_address }}</li>
</ul>
<a href="{{ $link }}" style="padding: 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Thank you for your understanding.</p>
<p>Sincerely,<br>The Frootify Team</p>
</body>
</html>
