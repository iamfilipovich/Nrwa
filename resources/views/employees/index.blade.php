@extends('layouts.app')

@section('content')

<div class="container">
    @include('messages')
    <div class="row">
        <div class="col-md-12">
            <h1>Employees</h1>
            <input type="text" id="search-input" placeholder="Search...">
            <ul id="search-results"></ul>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ url('/employees/create') }}" class="btn btn-primary float-end">{{ __('Create') }}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Hire Date</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td>{{ $employee->FirstName }}</td>
                        <td>{{ $employee->LastName }}</td>
                        <td>{{ $employee->Birthday }}</td>
                        <td>{{ $employee->HireDate }}</td>
                        <td>{{ $employee->Gendrer }}</td>
                        <td>
                            <form action="/employees/{{ $employee->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="/employees/{{ $employee->id }}" class="btn btn-info">View</a>
                                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var searchInput = document.getElementById('search-input');
    var searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        var searchTerm = this.value.trim();

        if (searchTerm.length > 0) {
            clearTimeout(window.searchTimeout);

            window.searchTimeout = setTimeout(function () {
                fetchSearchResults(searchTerm);
            }, 500);
        } else {
            clearSearchResults();
        }
    });

    function fetchSearchResults(searchTerm) {
        if (searchTerm.length > 0) {
            fetch('{{ route('search') }}?search=' + searchTerm)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    displaySearchResults(data, searchTerm);
                });
        } else {
            clearSearchResults();
        }
    }

    function displaySearchResults(results, searchTerm) {
        searchResults.innerHTML = '';

        results.forEach(function (result) {
            var fullName = result.FirstName + ' ' + result.LastName;
            var li = document.createElement('li');

            if (fullName.toLowerCase().includes(searchTerm.toLowerCase())) {
                var markup = `<mark>Name: ${fullName}</mark>, Gender: ${result.Gender}, Birthday: ${result.Birthday}, HireDate: ${result.HireDate}`;
                li.innerHTML = markup;
            } else {
                li.style.display = 'none'; // Hide the non-matching results
            }

            searchResults.appendChild(li);
        });
    }

    function clearSearchResults() {
        searchResults.innerHTML = '';
    }
</script>

<style>
    #search-results {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #search-results li {
        margin-bottom: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #search-results li mark {
        background-color: yellow;
        font-weight: bold;
    }
</style> 

@endsection
