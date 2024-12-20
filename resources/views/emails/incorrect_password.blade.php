<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>

<p>Looks like you hit a little snag with your Frootify password. Don't sweat it, let's get you back on track!</p>
<p>Click here to reset your password:</p>
<a href="{{ $reset_link }}" style="padding: 10px; background: #28a745; color: white; text-decoration: none;">
    {{ $button_text }}
</a>
<p>It's quick, easy, and will have you back to Frootify-ing in no time.</p>
<p>If you didn't request this, just ignore this email.</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
