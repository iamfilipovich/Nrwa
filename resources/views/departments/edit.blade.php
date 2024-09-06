@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('/departments') }}" class="btn btn-primary">{{ __('Departments') }}</a>
<div class="card col-6 offset-3">
  <h5 class="card-header">Edit Department</h5>
  <div class="card-body">
  @include('messages')
     <form action="/departments/{{$department->id}}" method="POST">
        @csrf
        @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="DepartmentName"  class ="form-control @error('DepartmentName') is-invalid @enderror"  value="{{ $department->DepartmentName }}" >
                    @error('DepartmentName')
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