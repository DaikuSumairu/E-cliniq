@extends('adminlte::page')

@section('title', 'Creating Dental Examination Record')

@section('content_header')
    <h1>Creating Dental Examination Record</h1>
@stop

@section('content')
    <div class="container border mx-auto pb-4" style="height: 625px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.consultationStore') }}">
            @csrf
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop