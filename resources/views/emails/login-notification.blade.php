<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Successful</title>
</head>

<body>
    <h2>Hello {{ $user->first_name ?? $user->name }},</h2>
    <p>✅ You have successfully logged in to <strong>NewsPortal</strong>.</p>
    <p>A new session has been started on your account.</p>
    <p>If this wasn’t you, please reset your password immediately.</p>
    <br>
    <small>— NewsPortal Security Team</small>
</body>

</html>