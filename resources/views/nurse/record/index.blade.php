@extends('adminlte::page')

@section('title', "Patient's Records")

@section('content_header')
    <h1>Patient's Record</h1>
@stop

@section('content')
<form action="{{ route('nurse.recordIndex') }}" method="GET">
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
                    @if ($user->year ?: $user->grade)
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
                    @foreach ($records->where('user_id', $user->id) as $record)
                        <a class="btn btn-info" href="{{ route('nurse.recordShow', $record->id) }}">Show</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$record->id}}">Edit</button>
        
                        <!-- Edit Modal for the Record -->
                        <div class="modal fade" id="editModal{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$record->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{$record->id}}">Edit Record of {{$record->user->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Edit form content -->
                                        <form method="POST" action="{{ route('nurse.recordUpdate', $record->id) }}">
                                            @csrf
                                            @method('PUT')
                                        
                                            <!-- Date Updated (Hidden) -->
                                            <input type="hidden" name="date_updated" value="{{ now() }}">

                                            <!-- First Row -->
                                            <div class="row mb-3">
                                                <!-- Birth Date -->
                                                <div class="col-6">
                                                    <label for="birth_date">Birth Date:</label>
                                                    <input type="text" readonly class="col-sm-6 ml-1" id="birth_date" style="border: none; outline: none;" name="birth_date" value="{{ $record->birth_date }}">
                                                </div>
                                        
                                                <!-- Age -->
                                                <div class="col-5">
                                                    <label for="age">Age:</label>
                                                    <input type="number" class="col-sm-4 ml-1" id="age" name="age" value="{{ $record->age }}">
                                                </div>
                                            </div>
                                        
                                            <!-- Second Row -->
                                            <div class="row mb-2">
                                                <!-- Sex -->
                                                <div class="col-6">
                                                    <label for="sex">Sex:</label>
                                                    <input type="text" readonly class="col-sm-6 ml-1" id="sex" style="border: none; outline: none;" name="sex" value="{{ $record->sex }}">
                                                </div>
                                        
                                                <!-- Civil Status -->
                                                <div class="col-6">
                                                    <label for="civil_status">Civil Status:</label>
                                                    <select class="form-select ml-2" id="civil_status" name="civil_status">
                                                        <option value="Single" {{ $record->civil_status === 'Single' ? 'selected' : '' }}>Single</option>
                                                        <option value="Married" {{ $record->civil_status === 'Married' ? 'selected' : '' }}>Married</option>
                                                        <option value="Widowed" {{ $record->civil_status === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                        <option value="Divorced" {{ $record->civil_status === 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <!-- Third Row -->
                                            <div class="row mb-4">
                                                <!-- Adddress -->
                                                <div class="col-6 pt-1">
                                                    <label for="address">Address:</label>
                                                </div>
                                        
                                                <!-- Mobile # -->
                                                <div class="col-6 mb-1">
                                                    <label for="mobile_number">Mobile #:</label>
                                                    <span id="mobile_number">+63</span>
                                                    <input type="text" class="col-sm-6 ml-1" id="mobile_number" name="mobile_number" pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the 1st digit start with "9"' 
                                                    value="{{ $record->mobile_number }}" required>
                                                </div>
                                                <input type="text" class="col-sm-12" id="address" name="address" value="{{ $record->address }}" required>
                                            </div>
                                        
                                            <!-- Fourth Row -->
                                            <div class="row mb-4">
                                                <!-- Contact Person -->
                                                <div class="col-6">
                                                    <label for="contact_person">Contact Person Name:</label>
                                                    <input type="text" class="col-sm-12" id="contact_person" name="contact_person" value="{{ $record->contact_person }}" required>
                                                </div>
                                        
                                                <!-- Contact Person # -->
                                                <div class="col-6">
                                                    <label for="contact_person_number">Contact Person #:</label>
                                                    <div class="input-group">
                                                        <span id="contact_person_number">+63</span>
                                                        <input type="text" class="col-sm-6 ml-2" id="contact_person_number" name="contact_person_number" pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the 1st digit start with "9"' 
                                                        value="{{ $record->contact_person_number }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
</div>
{!! $users->links('custom.pagination', ['paginator' => $users]) !!}
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
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