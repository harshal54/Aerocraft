@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4">Employee Data</h3>
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="country_code">Country Code:</label>
                        <select name="country_code" class="form-select">
                            <option value="">Selected Country Code</option>
                            <option value="+1">+1</option>
                            <option value="+91">+91</option>
                            <option value="+44">+44</option>
                        </select>
                        @error('country_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number:</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Enter mobile number">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" class="form-control" rows="4" placeholder="Enter address"></textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="d-flex">
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="male" class="form-check-input"> Male
                            </div>
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="female" class="form-check-input"> Female
                            </div>
                            <div class="form-check mx-2">
                                <input type="radio" name="gender" value="other" class="form-check-input"> Other
                            </div>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hobby">Hobbies:</label>
                        <div class="d-flex">
                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Reading" class="form-check-input"> Reading
                            </div>
                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Traveling" class="form-check-input"> Traveling
                            </div>
                            <div class="form-check mx-2">
                                <input type="checkbox" name="hobby[]" value="Sports" class="form-check-input"> Sports
                            </div>
                        </div>
                        @error('hobby')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" class="form-control">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary my-2">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
@endsection
