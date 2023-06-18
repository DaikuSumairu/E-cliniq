<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');


        $inventoryItems = Inventory::where('name', 'like', "%{$query}%")
            ->paginate(10);

        return view('nurse.inventory.index', compact('inventoryItems', 'query'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nurse.inventory.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    
        Inventory::create($request->all());
    
        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Inventory::findOrFail($id);

        return view('nurse.inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    
        $inventory->update($request->all());
    
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Inventory::findOrFail($id);
        $item->delete();
    
        return redirect()->back();
    }


}
