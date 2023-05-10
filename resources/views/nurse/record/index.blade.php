@extends('adminlte::page')

@section('title', "Patient's Records")

@section('content_header')
    <h1>Patient's Record</h1>
@stop

@section('content')
    <table class="table table-sm table-bordered">
        <tr>
            <th>Name</th>
            <th>Course / Department</th>
            <th>Grade / Year</th>
            <th>Section</th>
            <th>ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->course ?: $user->department }}</td>
            <td>{{ $user->year ?: $user->grade }}</td>
            <td>{{ $user->section }}</td>
            <td>{{ $user->school_id }}</td>
            <td>
                @if (!$records->where('user_id', $user->id)->count())
                    <a class="btn btn-success" href="{{ route('nurse.recordCreate', $user->id) }}">Create New Record</a>
                @endif
                @foreach ($records->where('user_id', $user->id) as $record)
                    <a class="btn btn-info" href="{{ route('nurse.recordShow',$record->id) }}">Show</a>            
                    <a class="btn btn-primary" href="{{ route('nurse.recordEdit',$record->id) }}">Edit</a>
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links('custom.pagination', ['paginator' => $users]) !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop