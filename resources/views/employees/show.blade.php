@extends ('layouts.app')

@section('content')
<div class="container"> 
<a href="{{ url('/employees') }}" class="btn btn-primary">{{ __('Employees') }}</a>
<div class="card col-6 offset-3">
    <h5 class="card-header">{{ $employee -> FirstName }}</h5>
    <div class="card-body">
        <h5 class="card-title">Prezime: {{ $employee -> LastName }}</h5>
        <p class="card-text">Hire date: {{ $employee -> HireDate }}</p>
        <p class="card-text">Birthday: {{ $employee -> Birthday }}</p>
        <p class="card-text">Gender: {{ $employee -> Gender }}</p>
    </div>
</div>
</div>
@endsection
