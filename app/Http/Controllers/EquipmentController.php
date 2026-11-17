<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipments = Equipment::latest() -> get();
        return view('equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request -> validate([
            'EquipmentName' => 'required', 
            'Category'      => 'required',
            'UnitPrice'     => 'required',    
            'Description'   => 'required',
            'Availability'  => 'required'
        ]);

        Equipment::create($validated -> all());

        return redirect() -> route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentController $equipmentController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipmentController $equipmentController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EquipmentController $equipmentController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipmentController $equipmentController)
    {
        //
    }
}
