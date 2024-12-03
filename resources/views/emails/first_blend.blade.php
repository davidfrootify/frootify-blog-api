<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Your first personalized blend with {{ $base_fruit }} is ready! We can't wait for you to taste the deliciousness you've created.</p>

<h3>Here's a quick recap of your blend:</h3>
<ul>
    <li><strong>Base:</strong> {{ $base_fruit }}</li>
    <li><strong>Mix-ins:</strong> {{ $mix_in_fruits }}</li>
</ul>

<p>Let us know what you think!</p>
<a href="{{ $link }}" style="padding: 10px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Enjoy your custom blend!</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>