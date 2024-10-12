<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>To-Do App</title>
</head>
<body>
    @include('components.header') 
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
