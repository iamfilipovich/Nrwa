@extends ('layouts.app')

@section('content')
<div class="conteiner">
  <a href="{{ url('/departments/create') }}" class="btn btn-primary">{{ __('Departments Create') }}</a>
    @include ('messages')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Department Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $departments as $department )
            
          <tr>
            <th scope="row">{{ $department ->id  }}</th>
            <td>{{ $department ->DepartmentName  }}</td>
            <td>
                <form action="/departments/{{ $department -> id }}" method="POST">
                    @method ('DELETE')
                    @csrf
                    <a href="/departments/{{ $department -> id }}" class="btn btn-info">View</a>
                    <a href="/departments/{{ $department -> id }}/edit" class="btn btn-success">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
        </table>

</div>

@endsection 






