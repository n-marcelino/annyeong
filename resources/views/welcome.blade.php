<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>annyeong!</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <h1>Home Page</h1>
    <a href="/login"> Login </a>
</br>
    <a href="/register"> Register </a>
</br>
<form method="POST" action="/logout">
    @csrf
    <button type = "submit">
        Logout
    </button>
</form>
</body>

</html>