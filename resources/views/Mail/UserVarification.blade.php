<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Shoping</title>
</head>

<body>
    <pre>
        Dear {{ $data->name }},

        Assalamu-Alaikum! Congratulation. Your Account was created Successfully. Click for Active your Account.

        <a href="{{ route('active_user_account', $data->remember_token) }}">Activate</a>

        Thanks,
        Online Shop Team
    </pre>
</body>

</html>
