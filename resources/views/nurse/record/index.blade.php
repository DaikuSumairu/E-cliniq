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
                    <!-- 
                        If User have record then 'show' and 'edit' will appear, 
                        else 'create' will appear instead
                    -->
                    @if ($user->record)
                        <a class="btn btn-info" href="{{ route('nurse.recordShow', $user->record->id) }}">Show</a>            
                        <a class="btn btn-primary" href="{{ route('nurse.recordEdit', $user->record->id) }}">Edit</a>
                    @else
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal{{$user->id}}">Create New Record</button>
                    @endif
                </td>
            </tr>

            <!-- Create Modal for the User -->
            <div class="modal fade" id="createModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="createModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel{{$user->id}}">Create New Record for {{ $user->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add your create form content here -->
                            <form method="POST" action="{{ route('nurse.recordStore') }}">
                                @csrf
                                
                                <!-- User ID Created (Hidden) -->
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <!-- Date Created (Hidden) -->
                                <input type="hidden" name="date_created" value="{{ now() }}">
                                <!-- Date Updated (Hidden Null) -->
                                <input type="hidden" name="date_updated" value="{{ now() }}">

                                <!-- First Row -->
                                <div class="row mb-3">
                                    <!-- Birth Date -->
                                    <div class="col-6">
                                        <label for="birth_date{{$user->id}}">Birth Date:</label>
                                        <input type="date" class="ml-2 col-7" id="birth_date{{$user->id}}" name="birth_date" onchange="calculateAge({{$user->id}})">
                                    </div>

                                    <!-- Age -->
                                    <div class="col-5">
                                        <label for="age{{$user->id}}">Age:</label>
                                        <input type="text" readonly class="col-sm-2 ml-1" id="age{{$user->id}}" style="border: none; outline: none;" name="age">
                                    </div>
                                </div>

                                <!-- Second Row -->
                                <div class="row mb-2">
                                    <!-- Sex -->
                                    <div class="col-6">
                                        <label for="sex">Sex:</label>
                                        <select class="form-select ml-2 mr-4" id="sex" name="sex">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <!-- Civil Status -->
                                    <div class="col-6">
                                        <label for="civil_status">Civil Status:</label>
                                        <select class="form-select ml-2" id="civil_status" name="civil_status">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
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
                                        <input type="text" class="col-sm-6 ml-1" id="mobile_number" name="mobile_number" 
                                            pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the first number start at "9"'>
                                    </div>
                                    <input type="text" class="col-sm-12" id="address" name="address">
                                </div>

                                <!-- Fourth Row -->
                                <div class="row mb-4">
                                    <!-- Contact Person -->
                                    <div class="col-6">
                                        <label for="contact_person">Contact Person Name:</label>                                        
                                        <input type="text" class="col-sm-12" id="contact_person" name="contact_person" >
                                    </div>
                                    
                                    <!-- Contact Person # -->
                                    <div class="col-6">
                                        <label for="contact_person_number">Contact Person #:</label>  
                                        <div class="input-group">                                      
                                            <span id="contact_person_number">+63</span>
                                            <input type="text" class="col-sm-6 ml-2" id="contact_person_number" name="contact_person_number" 
                                                pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the first number start at "9"'>
                                        </div>    
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
  
    {!! $users->links('custom.pagination', ['paginator' => $users]) !!}
    {!! $records->links() !!}
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