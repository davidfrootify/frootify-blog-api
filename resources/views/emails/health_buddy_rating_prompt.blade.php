<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $banner_text }}</h1>
<p>Hi {{ $username }},</p>
<p>We hope your recent Health Buddy session was helpful and informative.</p>
<p>To help us improve our services, we'd love to hear your feedback. Please take a moment to share your experience by completing this short survey:</p>
<a href="{{ $link }}" style="padding: 10px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
    {{ $button_text }}
</a>
<p>Your feedback is invaluable to us. Thank you for your time and for choosing Frootify.</p>
<p>Best regards,<br>The Frootify Team</p>
</body>
</html>
