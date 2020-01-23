<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>Тестовое задание</title>

    </head>
    <body>
    @include("layouts.header")
    <div id="app">
        <email-component></email-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
