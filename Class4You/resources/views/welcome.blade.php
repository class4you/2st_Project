<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <Header-Component></Header-Component>
        <App-Component></App-Component>
        {{-- <Main-Component></Main-Component> --}}
        <Footer-Component></Footer-Component>
    </div>
</body>
</html>