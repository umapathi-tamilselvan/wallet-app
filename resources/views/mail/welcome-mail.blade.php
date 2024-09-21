@component('mail::message')
<head>
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body>
    <h1>Hello {{ $user->name }},</h1>
    <p>Thank you for registering on our platform!</p>
    <p>If you have any questions, feel free to contact our support team.</p>

<p>Best regards,</p>
</body>
</html>
@endcomponent
