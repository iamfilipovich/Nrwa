<?php

namespace App\Http\Controllers;

use App\Models\DepartmentEmployee;
use App\Http\Requests\StoreDepartmentEmployeeRequest;
use App\Http\Requests\UpdateDepartmentEmployeeRequest;

class DepartmentEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
    {
    $departments_employees = DepartmentEmployee::all();
    return view('department_employee.index', compact('departments_employees'));
    }

     
     public function create()
     {
         return view('department_employee.create');
     }
     
     public function store(StoreDepartmentEmployeeRequest $request)
     {
         DepartmentEmployee::create($request->validated());
         return back()->with('success', 'Department Employee created successfully.');
     }
     
     public function show(DepartmentEmployee $department_employee)
     {
         return view('department_employee.show')->with('department_employee', $department_employee);
     }
     
     public function edit(DepartmentEmployee $department_employee)
     {
         return view('department_employee.edit')->with('department_employee', $department_employee);
     }
     
     public function update(UpdateDepartmentEmployeeRequest $request, $id)
    {
        $department_employee = DepartmentEmployee::findOrFail($id);
        $department_employee->update($request->validated());
        return view('department_employee.index')->with('success', 'Department employee updated successfully.');
    }

     
    public function destroy(DepartmentEmployee $department_employee)
    {
        if (!$department_employee) {
            return redirect()->route('department_employee.index')->with('error', 'Department Employee not found.');
        }

        $department_employee->delete();
        $department_employee=DepartmentEmployee::all();
        return redirect()->route('department_employee.index')->with('success', 'Department Employee deleted successfully.');
    }


    
}
