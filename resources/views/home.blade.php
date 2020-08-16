@extends('layouts.app')

@section('content')

<app inline-template>
    <!-- Site wrapper -->
    <div>
        <!-- main-header -->
        <main-header></main-header>

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

@endsection
