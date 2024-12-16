<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required|image',
            'hobby' => 'required',
        ]);
        // dd($request->all());
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->country_code = $request->country_code;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->hobby = implode(',', $request->hobby ?? []);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move(public_path('photos'), $name);
            $employee->photo = 'photos/' . $name;
        }

        $employee->created_at = now();
        $employee->save();

        return redirect()->route('employees.index')->with('success' , 'Employee Added Succesfully!');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'photo' => 'nullable|image',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->country_code = $request->country_code;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->hobby = implode(',', $request->hobby ?? []);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();

            $file->move(public_path('photos'), $name);

            $employee->photo = 'photos/' . $name;
        }

        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee Updated Successfully!');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success' , 'Employee Deleted Succesfully!');
    }
}
