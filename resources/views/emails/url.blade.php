<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <p>Ваша ссылка: <a href="http://127.0.0.1:8000/show/key={{ $data->url }}">тык</a></p>
    <p>Ваш ключ: {{ $data->url}}</p>
</body>
</html>
