<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hey {{ $username }},</p>
<p>Your recent Frootify order is confirmed! We can't wait to deliver it fresh right to your doorstep.</p>

<h3>Order Summary:</h3>
<ul>
    <li><strong>Order Number:</strong> {{ $order_no }}</li>
    <li><strong>Delivery Address:</strong> {{ $delivery_address }}</li>
    <li><strong>Delivery Date:</strong> {{ $delivery_date }}</li>
</ul>

<p>Track Your Order:</p>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>If you have any questions or need to make changes to your order, please contact our customer support team.</p>

<p>Happy Frootifying!</p>
<p>Best,<br>The Frootify Team</p>
</body>
</html>
