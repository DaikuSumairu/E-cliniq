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
                    @if ($user->record)
                        <a class="btn btn-info" href="{{ route('nurse.recordShow', $user->record->id) }}">Show</a>            
                        <a class="btn btn-primary" href="{{ route('nurse.recordEdit', $user->record->id) }}">Edit</a>
                    @else
                        <a class="btn btn-success" href="{{ route('nurse.recordCreate', $user->id) }}">Create New Record</a>
                    @endif
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