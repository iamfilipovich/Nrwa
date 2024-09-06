@extends ('layouts.app')

@section('content')
<div class="container"> 
<div class="card col-6 offset-3">
    <h5 class="card-header">{{ $salary -> Salary }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $salary -> FromDate }}</h5>
        <p class="card-text">{{ $salary -> ToDate }}</p>
        <p class="card-text">{{ $salary -> EmployeeID }}</p>
    </div>
</div>
</div>
@endsection
