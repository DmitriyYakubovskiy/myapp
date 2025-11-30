<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinosaur;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DinosaurController extends Controller
{
    private ImageManager $images;

    public function __construct()
    {
        $this->images = new ImageManager(new Driver());
    }

    public function index()
    {
        $dinosaurs = Dinosaur::all();
        return view('dinosaurs.index', compact('dinosaurs'));
    }

    public function create()
    {
        return view('dinosaurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'required|string|in:predator,herbivore',
            'image' => 'required|image',
            'image_full' => 'required|image',
            'description' => 'required|string',
            'details' => 'required|string',
        ]);

        $pathSmall = $request->file('image')->store('images', 'public');

        $absSmall = Storage::disk('public')->path($pathSmall);

        $this->images->read($absSmall)
            ->resize(400, 300)
            ->save();

        $validated['image'] = "storage/$pathSmall";

        $pathFull = $request->file('image_full')->store('images', 'public');
        $validated['image_full'] = "storage/$pathFull";

        Dinosaur::create($validated);

        return redirect()->route('dinosaurs.index')
            ->with('success', 'Динозавр добавлен!');
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
            'type' => 'required|string|in:predator,herbivore',
            'description' => 'required|string',
            'details' => 'required|string',
            'image' => 'nullable|image',
            'image_full' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {

            Storage::disk('public')->delete(str_replace('storage/', '', $dinosaur->image));

            $pathSmall = $request->file('image')->store('images', 'public');

            $absSmall = Storage::disk('public')->path($pathSmall);

            $this->images->read($absSmall)
                ->resize(400, 300)
                ->save();

            $validated['image'] = "storage/$pathSmall";
        } else {
            $validated['image'] = $dinosaur->image;
        }

        if ($request->hasFile('image_full')) {

            Storage::disk('public')->delete(str_replace('storage/', '', $dinosaur->image_full));

            $pathFull = $request->file('image_full')->store('images', 'public');
            $validated['image_full'] = "storage/$pathFull";

        } else {
            $validated['image_full'] = $dinosaur->image_full;
        }

        $dinosaur->update($validated);

        return redirect()->route('dinosaurs.show', $dinosaur->id)
            ->with('success', 'Динозавр обновлён!');
    }

    public function destroy(Dinosaur $dinosaur)
    {
        Storage::disk('public')->delete(str_replace('storage/', '', $dinosaur->image));
        Storage::disk('public')->delete(str_replace('storage/', '', $dinosaur->image_full));

        $dinosaur->delete();

        return redirect()->route('dinosaurs.index')
            ->with('success', 'Динозавр удалён!');
    }
}
