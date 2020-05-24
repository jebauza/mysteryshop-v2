@extends('layouts.app')

@section('content')

<div id="app">
    <app inline-template>
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- main-header -->
            @include('layouts.main-header')

            <!--left-menu -->
            @include('layouts.left-menu')

            {{-- content-wrapper --}}
            @include('layouts.content-wrapper')

            {{-- main-footer --}}
            @include('layouts.main-footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>

    </app>
</div>

@endsection
