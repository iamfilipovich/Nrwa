@extends ('layouts.app')

@section('content')
<div class="conteiner">
  <a href="{{ url('/departmentsemployees/create') }}" class="btn btn-primary">{{ __('Departments Employees Create') }}</a>
    @include ('messages')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Department ID</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $departments_employees as $department_employee )
            
          <tr>
            <th scope="row">{{ $department_employee ->id  }}</th>
            <td>{{ $department_employee ->DepartmentName  }}</td>
            <td>{{ $department_employee ->from_date  }}</td>
            <td>{{ $department_employee ->to_date  }}</td> 
            <td>{{ $department_employee ->employee_id  }}</td>
            <td>{{ $department_employee ->department_id  }}</td>
            <td>
                <form action="/departmentsemployees/{{ $department_employee -> id }}" method="POST">
                    @method ('DELETE')
                    @csrf
                    <a href="/departmentsemployees/{{ $department_employee -> id }}" class="btn btn-info">View</a>
                    <a href="/departmentsemployees/{{$department_employee->id}}/edit" class="btn btn-success">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
        </table>

</div>

@endsection 






