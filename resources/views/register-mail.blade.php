<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Registration Successfully</h1>
    <p>Dear {{ $details['name']}},</p>
    <p>Thank you for your
        registration. Your registered email address is {{ $details['email']}} and phone
        number {{ $details['phone']}}.</p>
</body>
</html>