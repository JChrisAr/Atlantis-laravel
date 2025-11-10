<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // Listado de propiedades
    public function index()
    {
        $properties = Property::with('images')->latest()->get();
        return view('properties.index', compact('properties'));
    }


    // Formulario de creación
    public function create()
    {
        return view('properties.create');
    }

// Guardar propiedad
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'category' => 'nullable|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        $property = Property::create($validated);

        return redirect()->route('properties.show', $property)
                         ->with('success', 'Propiedad creada exitosamente.');
    }

    // Mostrar una propiedad
    public function show(Property $property)
    {
        $property->load('images', 'user');
        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
