<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <x-header.header/>
    <main>
        <div id="feed-wrapper">
            <!-- To Be filled by Ajax -->
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
