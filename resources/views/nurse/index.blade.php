@extends('adminlte::page')

@section('title', 'Homepage')

@section('content_header')
    <h1>Daily Visit List</h1>
@stop

@section('content')
    <div class="container border" style="height: 470px;">
        <form method="POST" action="{{ route('nurse.visitStore') }}">
            @csrf
            <div class="row">
                <!-- ID -->
                <div class="col">
                </div>
                
                <!-- Name -->
                <div class="col">
                </div>

                <!-- Grade or Year (if the user is student) -->
                <div class="col">
                </div>
                
                <!-- Section (if the user is student) -->
                <div class="col">
                </div>
                
                <!-- Main Complaint -->
                <div class="col">
                </div>
                
                <!-- Sub Complaint -->
                <div class="col">
                </div>

                <!-- Medicine search (if needed only) -->
                <div class="col">
                </div>
            </div>
            <button>Submit</button>
        </form>
    </div>
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop