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
    <div class="login-wrapper"  style="display: flex;">
        <p style="color: red;">{{$registererror}}<p>
        <form action="/api/register" method="post" style="text-align: center">
            @csrf
            <div style="display: flex;">
            <input type="name" name="firstname" placeholder="Firstname" required style="width: 95px; margin-right: 5px;">
            <input type="name" name="surname" placeholder="Surname" required style="width: 95px; margin-left: 5px;">
            </div><br>
            <input type="email" name="email" placeholder="Email" required style="width: 210px;"> <br><br>
            <input type="password" name="password" placeholder="Password" required style="width: 210px;"> <br> <br>
            <button type="submit">Register!</button>
        </form><br>
    </div>
    <a href="login">Login</a> <br>
    <a href="/">Go back</a> <br>


</body>
</html>
