<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <x-header.header/>

    <main>
        <div class="wrapper">
            <div class="pfpEdit">
                <img id="img" src="{{ asset('img/' . Session::get('user')[0]->profile_pic) }}" alt="">
                <span>
                    <h3>Change Profile Picture</h3>
                    <form action="/api/edit/pfp" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="imgInp">
                        <button id="saveBtn"> Save </button>
                    </form>
                </span>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>
