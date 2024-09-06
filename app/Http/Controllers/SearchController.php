<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class SearchController extends Controller
{
    public function search()
    {
        $term = request('term');

        // Perform the search based on the received term
        $results = Employee::where('FirstName', 'like', '%'.$term.'%')->get(); // Modify this based on your model and search criteria

        return response()->json($results);
    }

    
}
