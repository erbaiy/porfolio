<?php

namespace App\Http\Controllers;

use App\Models\Experiment;
use Illuminate\Http\Request;

class ExperimentController extends Controller
{
    public function index()
    {

        $data = Experiment::all();

        return response()->json(['experiences' => $data]);
    }
    public function store(Request $request)
    {
        $experiment = Experiment::create($request->all());
        return response()->json(['experiment' => $experiment]);
    }
    public function update(Request $request, $id)
    {
        $experiment = Experiment::find($id);
        $experiment->update($request->all());
        return response()->json(['experiment' => $experiment]);
    }
    public function destroy($id)
    {
        $experiment =  Experiment::find($id);
        $experiment->delete();

        return response()->json(['message' => 'deleted successfully']);
    }
}
