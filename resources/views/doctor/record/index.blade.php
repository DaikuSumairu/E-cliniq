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
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->course ?: $user->department }}</td>
                <td>
                    @if ($user->year ?: $user->grade )
                        {{ $user->year ?: $user->grade }}
                    @else
                        Not Applicable
                    @endif
                </td>
                <td>
                    @if($user->section)
                        {{ $user->section }}
                    @else
                        Not Applicable
                    @endif
                </td>
                <td>{{ $user->school_id }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <!-- 
                        If User have record then 'show' and 'edit' will appear, 
                        else 'create' will appear.
                    -->
                    @foreach ($records->where('user_id', $user->id) as $record)
                        <a class="btn btn-info" href="{{ route('doctor.recordShow', $record->id) }}">Show</a>            
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
    <!-- Age depends on Date of Birth -->
    <script>
        function calculateAge(userId) {
            var birthDate = new Date(document.getElementById("birth_date" + userId).value);
            var today = new Date();
            var age = today.getFullYear() - birthDate.getFullYear();

            // Check if the birthday has not occurred yet this year
            if (today.getMonth() < birthDate.getMonth() || (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
                age--;
            }

            document.getElementById("age" + userId).value = age;
        }
    </script>
@stop