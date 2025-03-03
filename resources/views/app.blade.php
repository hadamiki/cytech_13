<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
   
    <title>@yield('title')</title>
</head>
<body>
    <div class="title">
    <h1>@yield('h1')</h1>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>