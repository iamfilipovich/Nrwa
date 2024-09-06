@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ url('/departmentsemployees') }}" class="btn btn-primary">{{ __('Departments Employees') }}</a>
    <div class="card  col-6 offset-3" >
        <div class="card-header">Create</div>
        <div class="card-body">
            @include('messages')
            <form action="/departmentsemployees" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="DepartmentName" class ="form-control @error('DepartmentName') is-invalid @enderror" >
                    @error('DeparmentName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" class ="form-control @error('from_date') is-invalid @enderror" >
                    @error('from_date')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>
                <div class="mb-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to_date" class ="form-control @error('to_date') is-invalid @enderror" >
                    @error('to_date')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="number" name="employee_id" class ="form-control @error('employee_id') is-invalid @enderror" >
                    @error('employee_id')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">Department ID</label>
                    <input type="number" name="department_id" class ="form-control @error('department_id') is-invalid @enderror" >
                    @error('department_id')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>





                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"> Submit </button>
                </div>
            </form>
          
        </div>
      </div>

</div>

@endsection