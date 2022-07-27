<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    

    @vite(['resources/js/app.js'])
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        @include('inc.navbar')
        <div class=container>
            @include('inc.messages')
            @yield('content')
        </div>
    </div>
    <script defer>
        // remove messages after some time
        setTimeout(function() {
            let alerts = document.querySelectorAll('.alert');
            alerts.forEach(
                function(alert) {
                    alert.remove();
                }
            );
        }, 2000);
</body>
</html>