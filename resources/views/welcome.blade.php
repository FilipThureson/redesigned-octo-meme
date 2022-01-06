<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <x-header.header/>
    <main>
        <div class="aside">
            <div class="search-wrapper">
                <input type="text" name="search" id="search">
                <button id="searchBtn"><i class="fa fa-search"></i></button>
            </div>
            <div id="output">
            </div>
        </div>
        <div id="feed-wrapper">
            <!-- To Be filled by Ajax -->
        </div>
        <div class="aside">

        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
