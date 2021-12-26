<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <p style="color: red;">{{$loginerror}}<p>
        <form action="/api/login/auth" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email" required >
            <input type="password" name="password" placeholder="Password" required >
            <button type="submit">Login!</button>
        </form>
    </div>
</body>
</html>
