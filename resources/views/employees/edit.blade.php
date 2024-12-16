@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4">Update Employee Data</h3>
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="{{ $employee->first_name }}" required
                            class="form-control" placeholder="Enter first name">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="{{ $employee->last_name }}" required
                            class="form-control" placeholder="Enter last name">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{ $employee->email }}" required class="form-control"
                            placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="country_code">Country Code:</label>
                        <select name="country_code" required class="form-control">
                            <option value="+1" {{ $employee->country_code == '+1' ? 'selected' : '' }} >+1</option>
                            <option value="+91"  {{ $employee->country_code == '+91' ? 'selected' : '' }}>+91</option>
                            <option value="+44"  {{ $employee->country_code == '+44' ? 'selected' : '' }}>+44</option>
                        </select>
                        @error('country_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number:</label>
                        <input type="number" name="mobile" value="{{ $employee->mobile }}" required class="form-control"
                            placeholder="Enter mobile number">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" required class="form-control" rows="4" placeholder="Enter address">{{ $employee->address }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="d-flex">
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="male"
                                    {{ $employee->gender == 'male' ? 'checked' : '' }} class="form-check-input"> Male
                            </div>
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="female"
                                    {{ $employee->gender == 'female' ? 'checked' : '' }} class="form-check-input"> Female
                            </div>
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="other"
                                    {{ $employee->gender == 'other' ? 'checked' : '' }} class="form-check-input"> Other
                            </div>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hobby">Hobbies:</label>
                        <div class="d-flex">
                            @php
                                $selectedHobbies = explode(',', $employee->hobby);
                            @endphp

                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Reading"
                                       class="form-check-input"
                                       {{ in_array('Reading', $selectedHobbies) ? 'checked' : '' }}> Reading
                            </div>
                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Traveling"
                                       class="form-check-input"
                                       {{ in_array('Traveling', $selectedHobbies) ? 'checked' : '' }}> Traveling
                            </div>
                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Sports"
                                       class="form-check-input"
                                       {{ in_array('Sports', $selectedHobbies) ? 'checked' : '' }}> Sports
                            </div>
                        </div>
                        @error('hobby')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" class="form-control">
                        <img src="{{ asset($employee->photo) }}" alt="Employee Photo" style="width: 100px; height: auto;">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block my-2">Update Employee</button>
                </form>
            </div>
        </div>
    </div>
@endsection
