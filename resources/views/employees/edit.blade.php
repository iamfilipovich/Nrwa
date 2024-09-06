@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/employees') }}" class="btn btn-primary">{{ __('Employees') }}</a>

<div class="card col-6 offset-3">
  <h5 class="card-header">Edit Employee</h5>
  <div class="card-body">
  @include('messages')
     <form action="/employees/{{$employee->id}}" method="POST">
        @csrf
        @method('PUT')
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="FirstName"  class ="form-control @error('FirstName') is-invalid @enderror"  value="{{ $employee->FirstName }}" >
                    @error('FirstName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="LastName"  class ="form-control @error('LastName') is-invalid @enderror" value="{{ $employee->LastName }}" >
                    @error('LastName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="Birthday" class ="form-control @error('Birthday') is-invalid @enderror" value="{{ $employee->Birthday }}">
                    @error('Birthday')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Hire Date</label>
                    <input type="date" name="HireDate" class ="form-control @error('HireDate') is-invalid @enderror" value="{{ $employee->HireDate }}">
                    @error('name')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>

                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" name="Gendrer" class ="form-control @error('Gender') is-invalid @enderror" value="{{ $employee->Gender }}">
                    @error('Gender')
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