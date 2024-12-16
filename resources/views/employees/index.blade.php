@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3>Employee Data</h3>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @if (!empty($employees))
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ asset($employee->photo) }}" alt="Employee Photo"
                                            style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->country_code }}-{{ $employee->mobile }}</td>
                                    <td>{{ ucfirst($employee->gender) }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @else
                            <tr>No Record Found!</tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
