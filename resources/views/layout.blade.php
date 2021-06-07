<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>.::Gelato app::.</title>
</head>
<body class="bg-gray-100">
    @yield('content')
    <div class="fixed-bottom">
        @include('flash::message')
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        $("#change-status").on('change', function(event) {
            event.preventDefault();
            $.ajax({
                url: `/update-status/${this.value}`,
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: this.value,
                    id: 16
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });
        $("#openMenu").on('click', function() {
            $('#menuModal').addClass('block');
            $('#menuModal').removeClass('hidden');
        });
    </script>
</body>
</html>
