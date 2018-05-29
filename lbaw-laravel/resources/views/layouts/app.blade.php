<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="997560327402-h7drds8gikmaab9da9qq8sr93lk6sld6.apps.googleusercontent.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Style -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Orbitron:500' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ URL::to('/') }}/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/images/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ URL::to('/') }}/images/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="{{ URL::to('/') }}/images/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="{{ URL::to('/') }}/images/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="{{ URL::to('/') }}/images/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="{{ URL::to('/') }}/images/favicon/mstile-310x310.png" />


    <!-- Scripts -->
    <script type="text/javascript" src={{ asset('js/app.js') }} defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <!--include inc.catalog-->
        @yield('content')
        @include('inc.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
