<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Looks like you forgot your password for Account. No worries, we've got you covered!</p>
<a href="{{ $reset_link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px ">
    {{ $button_text }}
</a>
<p>It's quick, easy, and will have you back to Frootify-ing in no time.</p>
<p>If you didn't request this, just ignore this email.</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
