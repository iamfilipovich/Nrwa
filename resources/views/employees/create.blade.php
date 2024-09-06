@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex">

        <a href="{{ url('/employees') }}" class="btn btn-primary">{{ __('Employees') }}</a>
    </div>
    <div class="card col-6 offset-3">
        <div class="card-header">Create Employee</div>
        <div class="card-body">
            @include('messages')
            <form action="/employees" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="FirstName" class="form-control @error('FirstName') is-invalid @enderror">
                    @error('FirstName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="LastName" class="form-control @error('LastName') is-invalid @enderror">
                    @error('LastName')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" name="Birthday" class="form-control @error('Birthday') is-invalid @enderror">
                    @error('Birthday')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Hire Date</label>
                    <input type="date" name="HireDate" class="form-control @error('HireDate') is-invalid @enderror">
                    @error('HireDate')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" name="Gendrer" class="form-control @error('Gender') is-invalid @enderror">
                    @error('Gender')
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
