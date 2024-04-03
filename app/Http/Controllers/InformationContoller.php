<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InformationContoller extends Controller
{
    public function index()
    {
        $informations = User::all();
        return response()->json(['informations' => $informations]);
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        // Create a new personal information record
        $information = User::create($validatedData);

        return response()->json(['information' => $information], 201);
    }

    public function update(Request $request, $id)
    {
        // Find the personal information record
        $information = User::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        // Update the personal information record
        $information->update($validatedData);

        return response()->json(['information' => $information]);
    }

    public function destroy($id)
    {
        // Find the personal information record
        $information = User::findOrFail($id);

        // Delete the personal information record
        $information->delete();

        return response()->json(null, 204);
    }
}
