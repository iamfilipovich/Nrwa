<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::all();
        return view('salaries.index') -> with('salaries', $salaries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalaryRequest $request)
    {
        Salary::create($request->validated());
        return back()->with('success', 'Salary created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view ('salaries.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $salary = Salary::findOrFail($salary->id);
        return view ('salaries.edit')->with('salary', $salary);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $salary = Salary::findOrFail($salary->id);
        $salary->update($request->validated());
        return back()->with('success', 'Salary updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return back()->with('success', 'Salary deleted successfully.');
    }
}
