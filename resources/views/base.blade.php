{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('body')
<div id="app">

    <app inline-template>
        @parent
    </app>

</div>
@stop

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div>
    <p>Welcome to this beautiful admin panel.</p>
    <example-component></example-component>
</div>

@php
@endphp
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop