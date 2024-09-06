@extends ('layouts.app')

@section('content')
<div class="container"> 
<div class="card col-6 offset-3">
    <h5 class="card-header">{{ $department_employee -> DepartmentName }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $department_employee -> from_date }}</h5>
        <p class="card-text">{{ $department_employee -> to_date }}</p>
        <p class="card-text">{{ $department_employee -> employee_id }}</p>
        <p class="card-text">{{ $department_employee -> department_id }}</p>
    </div>
</div>
</div>
@endsection
