<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('name')->get();

        return response()->json([
            'status' => 'success',
            'message' => "{$suppliers->count()} Suppliers listed successfully",
            'suppliers' => SupplierResource::collection($suppliers)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:suppliers,name'],
        ]);

        $supplier = Supplier::create([
            'name' =>  $request['name'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Supplier  created successfully.",
            'supplier' => new SupplierResource(Supplier::where('id', $supplier->id)->first()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return response()->json([
            'status' => 'success',
            'message' => "Supplier viewed.",
            'supplier' => new SupplierResource(Supplier::where('id', $supplier->id)->first()),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update([
            'name' => $request['name'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier updated successfully.',
            'supplier' => new SupplierResource(Supplier::where('id', $supplier->id)->first()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'supplier deleted successfully',
        ]);
    }
}
