<!DOCTYPE html>
<html>
<head>
    <title>Your Account Registration</title>
</head>
<body>
<h1>Welcome, {{ $firstname }}!</h1>
<p>Your account has been created. Below are your login details:</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>
<p>Please <a href="{{ $resetUrl }}">click here</a> to set your new password.</p>
</body>
</html>
