<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;

class MarkerController extends Controller
{
    public function index()
    {
        return response()->json(Marker::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $marker = Marker::create($request->only(['latitude', 'longitude', 'description']));
        return response()->json($marker);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $marker = Marker::findOrFail($id);
        $marker->update($request->only(['description']));
        return response()->json(['success' => true, 'message' => 'Marker updated successfully', 'marker' => $marker]);
    }

    public function destroy($id)
    {
        $marker = Marker::findOrFail($id);
        $marker->delete();
        return response()->json(['success' => true, 'message' => 'Marker deleted successfully']);
    }
}