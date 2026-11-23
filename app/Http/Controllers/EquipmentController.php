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
            'name'          => 'required', 
            'category'      => 'required',
            'price'         => 'required',    
            'description'   => 'required',
            'availability'  => 'required'
        ]);

        Equipment::create([
            'user_id'       => $user_id = $request -> user() -> id,
            'EquipmentName' => $validated['name'],
            'Category'      => $validated['category'],
            'UnitPrice'     => $validated['price'],
            'Description'   => $validated['description'],
            'Availability'  => $validated['availability'],
        ]);

        return redirect() -> route('equipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        //
        return view('equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        //
        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
        $validated = $request -> validate([
            'name'          => 'required', 
            'category'      => 'required',
            'price'         => 'required',    
            'description'   => 'required',
            'availability'  => 'required'
        ]);

        $equipment -> update([
            'EquipmentName' => $validated['name'],
            'Category'      => $validated['category'],
            'UnitPrice'     => $validated['price'],
            'Description'   => $validated['description'],
            'Availability'  => $validated['availability'],
        ]);

        return redirect() -> route('equipments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        //
        $equipment -> delete();

        return redirect() -> route('equipments.index');
    }
}
