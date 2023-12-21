<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
    <style>
        .wrapper {
            height:auto;
            min-height: 100%;
            padding-bottom: 150px; // 현재 푸터의 높이
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <Header-Component></Header-Component>
            <App-Component></App-Component>
        </div>
        <Footer-Component></Footer-Component>
    </div>
</body>
</html>