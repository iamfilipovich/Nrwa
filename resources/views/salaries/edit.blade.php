@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/salaries') }}" class="btn btn-primary">{{ __('Salaries') }}</a>
<div class="card col-6 offset-3">
  <h5 class="card-header">Edit Salaries</h5>
  <div class="card-body">
  @include('messages')
     <form action="/salaries/{{$salary->id}}" method="POST">
        @csrf
        @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" name="Salary"  class ="form-control @error('Salary') is-invalid @enderror"  value="{{ $salary->Salary }}" >
                    @error('Salary')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="FromDate"  class ="form-control @error('FromDate') is-invalid @enderror" value="{{ $salary->FromDate }}" >
                    @error('FromDate')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="ToDate" class ="form-control @error('ToDate') is-invalid @enderror" value="{{ $salary->ToDate }}">
                    @error('ToDate')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="number" name="EmployeeID" class ="form-control @error('EmployeeID') is-invalid @enderror" value="{{ $salary->EmployeeID }}">
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