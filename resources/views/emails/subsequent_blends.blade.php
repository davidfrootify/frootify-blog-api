<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Your latest personalized blend with {{ $base_fruit }} is ready! Get ready to experience a new flavor sensation.</p>

<h3>Here's a quick recap of your blend:</h3>
<ul>
    <li><strong>Base:</strong> {{ $base_fruit }}</li>
    <li><strong>Mix-ins:</strong> {{ $mix_in_fruits }}</li>
</ul>

<p>Enjoy your custom blend!</p>
<a href="{{ $link }}" style="padding: 10px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Best,<br>The Frootify Team</p>
</body>
</html>
