<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        try {
            return Service::where('status', 1)->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $request->merge(['status' => 1]);

        return Service::create($request->all());
    }

    public function update(Request $request, $id) {
        try {
            $request->validate([
                'price' => 'sometimes|numeric',
                'name' => 'sometimes|string',
                'description' => 'sometimes|string',
                'status' => 'sometimes|boolean',
            ]);

            $service = Service::findOrFail($id);

            $service->update($request->only(['name', 'description', 'price', 'status']));

            return response()->json([
                'message' => 'Service updated successfully',
                'service' => $service
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id) {
        Service::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
