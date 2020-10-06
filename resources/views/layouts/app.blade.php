<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">

    <title>MysteryShopper</title>
</head>

<body class="hold-transition sidebar-mini">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="wrapper" id="app">
        <App web_path="{{ route('web.basepath') }}"></App>
    </div>

    <!-- JQuery, Bootstrap, VueJS -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- AdminLTE --}}
    <script src="{{ asset('js/template.js') }}"></script>

</body>

</html>
