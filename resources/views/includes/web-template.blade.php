<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#66cc00" />
    <meta name="msapplication-navbutton-color" content="#66cc00">
    <meta name="apple-mobile-web-app-status-bar-style" content="#66cc00">
    <title>{{__('Live TV')}}</title>

    <style>
        body{
            background-color: blue;
        }
    </style>

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="{{asset('/js/app.js')}}"></script>
</head>

<body>
    <div class="backdrop-blur-xl">
        <!-- header -->
        @include('./includes/header')

        <!-- main content -->
        <div>
            {{ $slot }}
        </div>

        <!-- footer -->
        @include('./includes/footer')
    </div>
</body>

</html>
