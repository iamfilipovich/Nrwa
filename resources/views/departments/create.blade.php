@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ url('/departments') }}" class="btn btn-primary">{{ __('Departments') }}</a>
    <div class="card col-6 offset-3">
        <div class="card-header">Create Department</div>
        <div class="card-body">
            @include('messages')
            <form action="/departments" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">Department ID</label>
                    <input type="text" name="DepartmentID" class="form-control @error('DepartmentID') is-invalid @enderror">
                    @error('DepartmentID')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" name="DepartmentName" class="form-control @error('DepartmentName') is-invalid @enderror">
                    @error('DepartmentName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
