<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Great news! You've successfully reset your Frootify password.</p>
<p>You can now log in to your account and continue enjoying the Frootify app.</p>
<p>If you have any questions or need further assistance, please don't hesitate to contact our friendly support team.</p>
<a href="{{ $reset_link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px ">
    {{ $button_text }}
</a>

<p>Best,<br>The Frootify Team</p>
</body>
</html>
