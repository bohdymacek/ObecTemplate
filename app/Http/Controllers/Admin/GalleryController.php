<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{


    public function index()
    {
        $galleries = Gallery::latest()->paginate(15); // Change $images to $galleries
        return view('admin.gallery.index', compact('galleries')); // Pass as 'galleries'
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($gallery->image);
            $data['image'] = $request->file('image')->store('images/gallery');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('message', 'Obrázek aktualizován.');
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Obrázek přidán!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) { // ✅ Check if image exists before deleting
            Storage::delete($gallery->image);
        }

        $gallery->delete();

        return back()->with('message', 'Obrázek smazán.');
    }
}
