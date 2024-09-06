<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class EmployeeApi extends Controller
{
    public function index(): JsonResponse
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());
        return response()->json(['message' => 'Employee created', 'employee' => $employee], 201);
    }

    public function show($id): JsonResponse
    {
        try {
            $employee = Employee::findOrFail($id);
            return response()->json($employee);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): JsonResponse
    {
        $employee->update($request->validated());
        return response()->json(['message' => 'Employee updated', 'employee' => $employee]);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return response()->json(['message' => 'Employee deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }
}
