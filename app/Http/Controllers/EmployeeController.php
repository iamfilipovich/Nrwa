<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return back()->with('success', 'Employee created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);
        return view ('employees.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);
        $employee->update($request->validated());
        return back()->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id);
        $employee->delete();
        return back()->with('success', 'Employee deleted successfully.');
    }

   /* public function search(Employee $request)
    {
        $searchTerm = $request->input('search');

        $employees = Employee::where('name', 'LIKE', "%$searchTerm%")->get();

        return view('employee.search', compact('employees', 'searchTerm'));
    }

    public function render()
    {
        $employee = Employee::where('FirstName', 'LIKE', '%' . $this->search . '%')->orderBy('id', 'DESC')->paginate(6);
        return view('employee.index', ['employees' => $employee]);
    }*/
}
