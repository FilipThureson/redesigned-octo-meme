<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <x-head.head/>
</head>
<body>

    <x-header.header/>
    <main>
        <div id="wrapper">
            <form id="uploadForm" action="/api/upload" method="post" enctype="multipart/form-data">
                <input accept="image/*" type='file' id="imgInp" name="image"/>
                <div id="img-wrapper">
                    <img id="img" src="#" alt="your image" />
                </div>
                <input id="title" name="title" type="text" placeholder="Caption"/>
                <button type="submit">Upload</button>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/upload.js') }}"></script>
</body>
</html>
