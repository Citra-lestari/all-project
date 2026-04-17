<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    @vite(['resources/css/dashboard.css', 'resources/javascripts/sidebar.js', 'resources/javascripts/pagination.js', 'resources/javascripts/pop-up-delete.js'])
</head>
<body class="body-setting">

    <main class="main-setting">
        {{-- SIDEBAR --}}
        <x-sidebar />

        {{-- CONTENT --}}
        <div class="content-setting">
            <x-navbar />

            {{$slot}}
        </div>
    </main>

</body>
</html>
