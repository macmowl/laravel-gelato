<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> -->
    <title>Gelato - Product management</title>
</head>
<body class="bg-gray-100">
    @yield('content')
    <div class="fixed-bottom">
        @include('flash::message')
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>
</html>