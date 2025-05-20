<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="max-w-screen-sm mx-auto bg-white min-vh-100 p-3">
        @yield('content')
    </div>

    @include('includes.nav-mobile')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcRf0tY3LHB60NNkmXc5s9fDVZLEsAA55NDz0xhy9GkcIdsK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>

</html>
