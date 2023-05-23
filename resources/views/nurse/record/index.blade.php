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
                <td>
                    <!-- 
                        If User have record then 'show' and 'edit' will appear, 
                        else 'create' will appear.
                    -->
                    @if (!$records->where('user_id', $user->id)->count())
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal{{$user->id}}">Create New Record</button>
                    @endif

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

                                <!-- First Row -->
                                <div class="row mb-3">
                                    <!-- Birth Date -->
                                    <div class="col-6">
                                        <label for="birth_date{{$user->id}}">Birth Date:</label>
                                        <input type="date" class="ml-2 col-7" id="birth_date{{$user->id}}" name="birth_date" onchange="calculateAge({{$user->id}})" required>
                                    </div>

                                    <!-- Age -->
                                    <div class="col-5">
                                        <label for="age{{$user->id}}">Age:</label>
                                        <input type="text" readonly class="col-sm-4 ml-1" id="age{{$user->id}}" style="border: none; outline: none;" name="age">
                                    </div>
                                </div>

                                <!-- Second Row -->
                                <div class="row mb-2">
                                    <!-- Sex -->
                                    <div class="col-6">
                                        <label for="sex">Sex:</label>
                                        <select class="form-select ml-2 mr-4" id="sex" name="sex" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <!-- Civil Status -->
                                    <div class="col-6">
                                        <label for="civil_status">Civil Status:</label>
                                        <select class="form-select ml-2" id="civil_status" name="civil_status" required>
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
                                            pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the first number start at "9"' required>
                                    </div>
                                    <input type="text" class="col-sm-12" id="address" name="address" required>
                                </div>

                                <!-- Fourth Row -->
                                <div class="row mb-4">
                                    <!-- Contact Person -->
                                    <div class="col-6">
                                        <label for="contact_person">Contact Person Name:</label>                                        
                                        <input type="text" class="col-sm-12" id="contact_person" name="contact_person" required>
                                    </div>
                                    
                                    <!-- Contact Person # -->
                                    <div class="col-6">
                                        <label for="contact_person_number">Contact Person #:</label>  
                                        <div class="input-group">                                      
                                            <span id="contact_person_number">+63</span>
                                            <input type="text" class="col-sm-6 ml-2" id="contact_person_number" name="contact_person_number" 
                                                pattern="[9][0-9]{9}" title='Please enter a valid 10-digit mobile number where the first number start at "9"' required>
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