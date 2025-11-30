<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinosaur;

class DinosaurController extends Controller
{
    public function index()
    {
        $dinosaurs = Dinosaur::all();

        return view('dinopedia', compact('dinosaurs'));
    }

    public function create()
    {
        return view('dinosaurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'image' => 'required|string',
            'image_full' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
        ]);

        Dinosaur::create($validated);

        return redirect()->route('dinosaurs.index')
                         ->with('success', 'Динозавр успешно добавлен!');
    }

    public function show(Dinosaur $dinosaur)
    {
        return view('dinosaurs.show', compact('dinosaur'));
    }

    public function edit(Dinosaur $dinosaur)
    {
        return view('dinosaurs.edit', compact('dinosaur'));
    }

    public function update(Request $request, Dinosaur $dinosaur)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'image' => 'required|string',
            'image_full' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
        ]);

        $dinosaur->update($validated);

        return redirect()->route('dinosaurs.index')
                         ->with('success', 'Данные обновлены');
    }

    public function destroy(Dinosaur $dinosaur)
    {
        $dinosaur->delete();

        return redirect()->route('dinosaurs.index')
                         ->with('success', 'Динозавр удалён');
    }
}
