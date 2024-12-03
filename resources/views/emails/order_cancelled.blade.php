<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Dear {{ $username }},</p>
<p>We're sorry to inform you that your Frootify order, {{ $order_no }}, has been cancelled.</p>

<h3>Reason for Cancellation:</h3>
<p>{{ $cancellation_reason }}</p>

<p>We apologize for any inconvenience this may cause. If you have any questions or need further assistance, please contact our customer support team:</p>
<a href="{{ $link }}" style="padding: 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Thank you for your understanding.</p>
<p>Sincerely,<br>The Frootify Team</p>
</body>
</html>
