<?php

namespace App\Http\Controllers;
use App\Models\Titles;


use Illuminate\Http\Request;

class TitlesApiController extends Controller
{
    public function index()
    {
        $titles = Titles::all();
        return response()->json($titles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'emp_no' => 'required|numeric'
        ]);

        $title = Titles::create($validatedData);
        return response()->json($title, 201);
    }

    public function show($id)
    {
        $title = Titles::findOrFail($id);
        return response()->json($title);
    }

    public function update(Request $request, $id)
    {
        $title = Titles::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'emp_no' => 'required|numeric'
        ]);

        $title->update($validatedData);
        return response()->json($title);
    }

    public function destroy($id)
    {
        $title = Titles::findOrFail($id);
        $title->delete();
        return response()->json(['message' => 'Title deleted successfully']);
    }

}
