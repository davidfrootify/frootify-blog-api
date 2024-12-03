<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hi {{ $username }},</p>
<p>Great news! Your order, {{ $order_no }}, is now ready for pickup at {{ $service_point_name }}.</p>

<h3>Pickup Details:</h3>
<ul>
    <li><strong>Pickup Location:</strong> {{ $service_point_address }}</li>
    <li><strong>Pickup Time:</strong> {{ $pickup_time }}</li>
</ul>

<p>We can't wait for you to enjoy your purchase!</p>
<a href="{{ $link }}" style="padding: 10px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>

<p>Best,<br>The Frootify Team</p>
</body>
</html>
