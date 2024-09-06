@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Employees</h1>

        <form action="{{ route('employees.search') }}" method="GET">
            <div class="form-group">
                <label for="search">Search Term:</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Enter search term">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Prikaz rezultata pretrage -->
        @if ($employees)
            <h2>Search Results:</h2>
            <ul>
                @foreach ($employees as $employee)
                    <li>{{ $employee->FirstName }}</li>
                    <li>{{ $employee->LastName }}</li>
                    <li>{{ $employee->Birthday }}</li>
                    <!-- Prikaz dodatnih informacija o rezultatima pretrage -->
                @endforeach
            </ul>
        @endif
    </div>
@endsection
