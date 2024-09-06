@extends ('layouts.app')

@section('content')
<div class="container"> 
<div class="card col-6 offset-3">
    <h5 class="card-header">{{ $department -> DepartmentName }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $department -> from_date }}</h5>
        <p class="card-text">{{ $department -> to_date }}</p>
        <p class="card-text">{{ $department -> department_id }}</p>
        <p class="card-text">{{ $department -> employee_id }}</p>
    </div>
</div>
</div>
@endsection
