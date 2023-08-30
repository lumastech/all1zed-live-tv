<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel')}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="grid grid-cols-12 gap-1 absolute h-full w-full bg-gray-50">
        <div class="hidden md:flex md:col-span-2 shadow-md h-full overflow-x-hidden overflow-y-auto bg-white">
            <div class="block w-full">
                @include('./admin/includes/sidenav')
            </div>
        </div>
        <div class="col-span-12 md:col-span-10 h-full overflow-x-hidden overflow-y-auto">
            <div class="sticky">
                @include('./admin/includes/header')
            </div>
            <div class="px-2 md:px-7 xl:px-20 py-7">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
