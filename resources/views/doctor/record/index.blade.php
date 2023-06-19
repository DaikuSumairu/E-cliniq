@extends('adminlte::page')

@section('title', "Patient's Records")

@section('content_header')
    <h1>Patient's Record</h1>
@stop

@section('content')
<form action="{{ route('doctor.recordIndex') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search by school ID" name="query" value="{{ $query }}">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>

<div class="mx-auto mb-2" style="width: 1279px;height: 470px;overflow: auto;">
    <table class="table table-sm table-bordered">
        <tr>
            <th>Name</th>
            <th id="courseSchoolHeader">
                Course / School of
            </th>
            <th id="gradeYearHeader">
                Grade / Year
            </th>
            <th>Section</th>
            <th>ID</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr class="user-row" data-course="{{ $user->course }}" data-department="{{ $user->department }}" data-grade="{{ $user->grade }}" data-year="{{ $user->year }}">
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
</div>
    {!! $users->links('custom.pagination', ['paginator' => $users]) !!}
@stop

@section('footer')
    <p class="mb-0 h5 text-right">Asia Pacific College Data Privacy Act</p>
@endsection

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
    
    <!-- Sort between Course, Shool, or Both -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var CSheader = document.getElementById('courseSchoolHeader');
            var CSoptions = ["Course / School of", "Course", "School of"];
            var CScurrentOptionIndex = 0;
            var CSselectedOption = CSoptions[CScurrentOptionIndex];

            CSheader.addEventListener('click', function() {
                CScurrentOptionIndex = (CScurrentOptionIndex + 1) % CSoptions.length;
                CSselectedOption = CSoptions[CScurrentOptionIndex];
                CSheader.innerHTML = CSselectedOption;
                updateUsersList();
            });

            var GYheader = document.getElementById('gradeYearHeader');
            var GYoptions = ["Grade / Year", "Grade", "Year"];
            var GYcurrentOptionIndex = 0;
            var GYselectedOption = GYoptions[GYcurrentOptionIndex];

            GYheader.addEventListener('click', function() {
                GYcurrentOptionIndex = (GYcurrentOptionIndex + 1) % GYoptions.length;
                GYselectedOption = GYoptions[GYcurrentOptionIndex];
                GYheader.innerHTML = GYselectedOption;
                updateUsersList();
            });

            function updateUsersList() {
                var users = document.getElementsByClassName('user-row');

                for (var i = 0; i < users.length; i++) {
                    var userCourse = users[i].getAttribute('data-course');
                    var userDepartment = users[i].getAttribute('data-department');
                    var userGrade = users[i].getAttribute('data-grade');
                    var userYear = users[i].getAttribute('data-year');
                
                    var CSdisplay = false;
                    var GYdisplay = false;
                
                    if (CSselectedOption === "Course" && userCourse !== "") {
                        CSdisplay = true;
                    } else if (CSselectedOption === "School of" && userDepartment !== "") {
                        CSdisplay = true;
                    } else if (CSselectedOption === "Course / School of" && (userCourse !== "" || userDepartment !== "")) {
                        CSdisplay = true;
                    } else if (CSselectedOption === "Course / School of" && userCourse === "" && userDepartment === "") {
                        CSdisplay = true; // Show users with null grade and null year
                    }
                
                    if (GYselectedOption === "Grade" && userGrade !== "") {
                        GYdisplay = true;
                    } else if (GYselectedOption === "Year" && userYear !== "") {
                        GYdisplay = true;
                    } else if (GYselectedOption === "Grade / Year" && (userGrade !== "" || userYear !== "")) {
                        GYdisplay = true;
                    } else if (GYselectedOption === "Grade / Year" && userGrade === "" && userYear === "") {
                        GYdisplay = true; // Show users with null grade and null year
                    }
                
                    if (CSdisplay && GYdisplay) {
                        users[i].style.display = "table-row";
                    } else {
                        users[i].style.display = "none";
                    }
                }
            }

            // Update the user list on pagination change
            var paginationLinks = document.querySelectorAll('.pagination-link');
            for (var i = 0; i < paginationLinks.length; i++) {
                paginationLinks[i].addEventListener('click', function() {
                    setTimeout(function() {
                        updateUsersList();
                    }, 0);
                });
            }

            // Initial update of the user list
            updateUsersList();
        });
    </script>
@stop