@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ url('/salaries') }}" class="btn btn-primary">{{ __('Salaries') }}</a>
    <div class="card  col-6 offset-3" >
        <div class="card-header">Create Salary</div>
        <div class="card-body">
            @include('messages')
            <form action="/salaries" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" name="Salary" class ="form-control @error('Salary') is-invalid @enderror" >
                    @error('Salary')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">From date</label>
                    <input type="date" name="FromDate"  class ="form-control @error('FromDate') is-invalid @enderror" >
                    @error('FromDate')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="ToDate"  class ="form-control @error('ToDate') is-invalid @enderror" >
                    @error('ToDate')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Employee Id</label>
                    <input type="number" name="EmployeeID"  class ="form-control @error('EmployeeID') is-invalid @enderror" >
                    @error('EmployeeID')
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