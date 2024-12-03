<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Your fresh, delicious Frootify order is on its way!</p>

<h3>Order Summary:</h3>
<ul>
    <li><strong>Order Number:</strong> {{ $order_no }}</li>
</ul>

<p>You can track your delivery here:</p>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>We can't wait for you to enjoy them!</p>
<p>Happy Frootifying!</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
