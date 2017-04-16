<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h3 style="text-align: center">{{config('app.name')}}</h3>

<p>Hi,</p>

<p>Your platform account was created</p>

<p>
    To activate the account, you will need to 
    <strong><a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode
    ($user->email) }}">click on this link</a></strong>
</p>

<p>We strongly recommend changing your password as soon as you log in.</p>

<hr>
<p>
    Please do not reply to this email, it is automatically generated.
</p>

<br>
<p>At,</p>
<p>Luis Alberto Concha Curay</p>


</body>
</html>
