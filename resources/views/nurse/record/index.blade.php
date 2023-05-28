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