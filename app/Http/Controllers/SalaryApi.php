<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryApi extends Controller
{
    public function index()
    {
        $salary = Salary::all();


        return response()->json($salary);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Salary' => 'required',
            'FromDate' => 'required',
            'ToDate' => 'required',
            'EmployeeID' => 'required',
        ]);

        $salary = Salary::create($request->post());

        return response()->json($salary, 201);
    }


    public function show($id)
    {

        $salary = Salary::find($id);
        return $salary;
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'Salary' => 'required',
            'FromDate' => 'required',
            'ToDate' => 'required',
            'EmployeeID' => 'required',
        ]);

        $salary->update($request->all());
        $salary->save();

        return $salary;
    }
    
    public function destroy($id)
    {
        $salary=Salary::find($id)->delete();
        return "Salary deleted";
    }
}