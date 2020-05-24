<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> Dashboard </title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="sidebar-mini">
    <div id="app">
        <app inline-template>
            <div class="wrapper">

                {{--  main-header --}}
                @include('layouts.main-header')

                {{-- left-menu --}}
                @include('layouts.left-menu')

                {{-- content-wrapper --}}
                @include('layouts.content-wrapper')

            </div>
        </app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
