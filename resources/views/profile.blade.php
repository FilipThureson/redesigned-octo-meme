<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <x-header.header/>

    <main>
        <div id="user-wrapper">
            <div id="top-row">
                <div class="top-row-div" id="profile-pic">
                    <img id="pfp" src="{{ asset('img/blank-profile.png') }}" alt="">
                    <span id="name">
                    </span>
                </div>
                <div class="top-row-div followers-column">
                    <span id="amountOfPosts"></span>
                    <span>Posts</span>
                </div>
                <div id="followers" class="top-row-div followers-column followinfo">
                    <span id="amountOfFollowers"></span>
                    <span>Followers</span>
                </div>
                <div id="follows" class="top-row-div followers-column followinfo">
                    <span id="amountOfFollowing"></span>
                    <span>Follows</span>
                </div>
            </div>
            <div id="middle-row">

                @if (Session::get('user')[0]->id == $id)
                    <button><a id="edit-link" href="/profile/edit">Edit</a></button>
                @else
                    <button id="followBtn">Follow</button>
                @endif

            </div>
            <div id="post-row">
            </div>
        </div>¨
        <div id="followInfo">
            <h1>hello</h1>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
