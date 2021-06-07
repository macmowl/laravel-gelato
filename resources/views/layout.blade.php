<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="icon" href="/assets/favicon.ico" type="image/x-icon"/>
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
                    id: $("#idCake").val()
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
        $('#menuModal').on('click', function() {
            $('#menuModal').removeClass('block');
            $('#menuModal').addClass('hidden');
        });

        $('input[type=radio][name=nbrPersons]').on('click', function() {
            console.log($('input[name=nbrPersons]:checked').val());
            $('input[type=number][name=nbrPersons]').val('');
        });
        $('input[type=number][name=nbrPersons]').on('input', function() {
            console.log($('input[type=number][name=nbrPersons]').val());
            $('input[type=radio][name=nbrPersons]').prop("checked", false);
        });

        $('#price').val($('input[name=nbrPersons]').val() * 4);
        $('#price, #advance').each(function() {
            $(this).on('change', function(){
                $('#remaining').html($('#price').val() - $('#advance').val());
            });
        });
        $('input[name=nbrPersons]').on('change', function(){
            $('#price').val(this.value * 4);
            $('#remaining').html($('#price').val() - $('#advance').val());
        });

    </script>
</body>
</html>
