<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Your Frootify order has arrived! We hope you're excited to enjoy the freshest fruits.</p>

<h3>Order Summary:</h3>
<ul>
    <li><strong>Order Number:</strong> {{ $order_no }}</li>
</ul>

<p>If you have any issues with your order, please don't hesitate to contact our customer support team:</p>
<a href="{{ $link }}" style="padding: 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Happy Frootifying!</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
