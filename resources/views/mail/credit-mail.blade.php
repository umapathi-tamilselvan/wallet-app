@component('mail::message')
<h1>Credited Successfully </h1>
<p>Dear {{ $user->name }},</p>

<p>We are pleased to inform you that a credit of <strong>Rs.{{ number_format($amount, 2) }}</strong> has been successfully applied to your account.</p>

<p>If you have any questions, feel free to contact our support team.</p>

<p>Best regards,</p>
<p>The {{ config('app.name') }} Team</p>
@endcomponent
