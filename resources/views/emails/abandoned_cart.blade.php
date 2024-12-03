<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Looks like you started something special but didn't quite finish. We found this in your basket:</p>

<h3>Items in Your Basket:</h3>
<ul>
    @foreach ($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>

<p>Ready to check out?</p>
<a href="{{ $link }}" style="padding: 10px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>No worries if you change your mind. Just let us know.</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
