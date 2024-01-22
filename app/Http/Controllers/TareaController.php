<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $tareas = Tarea::latest()->paginate(5);
        return view('index', ['tareas' => $tareas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Tarea::create($request->all());
        return redirect()->route('tareas.index')->with('success', 'Nueva tarea creada exitosamente');
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
    public function edit(Tarea $tarea):View
    {
        return view('edit', ['tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea):RedirectResponse
    {
        $tarea->update($request->all());
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea):RedirectResponse
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada exitosamente');
    }
}
