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
        <form action="/api/reset/password" method="post">
            @csrf
            <input type="password" name="password" placeholder="New Password" required >
            <input type="password" name="password_confirm" placeholder="Confirm Password" required >
            <input type="hidden" name="token" value="{{ $token }}">
            <button type="submit">Reset!</button>
        </form>
        <a href="/">Go back</a>
    </div>
</body>
</html>
