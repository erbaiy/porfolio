<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $data = Formation::all();

        return response()->json(['formations' => $data]);
    }
    public function store(Request $request)
    {
        $formations = Formation::create($request->all());
        return response()->json(['formations' => $formations]);
    }
    public function update(Request $request, $id)
    {
        $formations = Formation::find($id);
        $formations->update($request->all());
        return response()->json(['formations' => $formations]);
    }
    public function destroy($id)
    {
        $formations =  Formation::find($id);
        $formations->delete();

        return response()->json(['message' => 'deleted successfully']);
    }
}
