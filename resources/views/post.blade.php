<!DOCTYPE html>
<html lang="en">
<head>

    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
</head>
<body>
    <x-header.header/>
    <main>

        <div class="post-wrapper">
            <div class="post">
                <span class="top-row">
                    <a id="profile-link" href="/profile/4">
                        <img id="post-pfp" class="post-pfp" src="{{ asset('img/blank-profile.png') }}">
                        <div>
                            <h4 id="name">Filip Thuresson</h4>
                        </div>
                    </a>
                </span>
                <span class="bottom-row">
                    <img id="post-img" class="post-img" src="{{ asset('img/a22b8e8db3e8bebf5edb.jpg') }}" alt="">
                </span>
            </div>
        </div>

        <div class="comments-wrapper">
            <div class="comments">
                <span class="top-row">
                        <div><img id="caption-pfp" class="pfp" src="{{ asset('img/blank-profile.png') }}"><h4 id="name-caption"></h4>:&nbsp;<p id="caption"></p></div>
                        <h6>2021-05-02 22:04:24</h6>
                </span>
                <div id="output" class="output">
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/post.js') }}"></script>
</body>
</html>
