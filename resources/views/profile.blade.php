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
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span id="name">
                        Name Surname
                    </span>
                </div>
                <div class="top-row-div followers-column">
                    <span id="amountOfPosts">50</span>
                    <span>Posts</span>
                </div>
                <div class="top-row-div followers-column">
                    <span id="amountOfFollowers">50</span>
                    <span>Followers</span>
                </div>
                <div class="top-row-div followers-column">
                    <span id="amountOfFollowing">50</span>
                    <span>Follows</span>
                </div>
            </div>
            <div id="middle-row">

                @if (Session::get('user')[0]->id == $id)
                    <button>Edit</button>
                @else
                    <button id="followBtn">Follow</button>
                @endif

            </div>
            <div id="post-row">
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
