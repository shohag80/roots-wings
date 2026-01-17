<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROOTS & WINGS</title>
</head>

<body>
    <pre>
        Dear {{ $data->name }},

        Assalamu-Alaikum! Congratulation. Your Account was created Successfully. 
        Click for Active your Account.

        <a href="{{ route('active_user_account', $data->remember_token) }}"><button style="padding: 3px 5px; background-color: green; border-radius: 5%; color: white;">Activate</button></a>

        Thanks,
        Roots & Wings Team
    </pre>
</body>

</html>
