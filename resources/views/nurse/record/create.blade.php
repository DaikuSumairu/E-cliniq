@extends('adminlte::page')

@section('title', "Patient's Records")

@section('content_header')
    <h1>Creating Patient's Record for {{ $user->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('nurse.recordIndex') }}"> Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('nurse.recordStore') }}" method="POST">
        @csrf
    
        <!-- User ID Created (Hidden) -->
        <!-- Date Created (Hidden) -->
        <!-- Birth Date -->
        <!-- Age -->
        <!-- Sex -->
        <!-- Civil Status -->
        <!-- Adddress -->
        <!-- Mobile # -->
        <!-- Contact Person -->
        <!-- Contact Person # -->
    
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <!-- Age depends on Date of Birth -->
    <script>
    function calculateAge() {
        var birthDate = new Date(document.getElementById("birth_date").value);
        var today = new Date();
        var age = today.getFullYear() - birthDate.getFullYear();

        // Adjust age if birth date has not occurred yet this year
        if (today.getMonth() < birthDate.getMonth() ||
            (today.getMonth() == birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
            age--;
        }

        document.getElementById("age").value = age;
    }
</script>
@stop