<?php

// app/Http/Controllers/ModuleController.php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        $modules = Module::all();
        return view('home', compact('categories', 'modules'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('modules.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('cover_image')->store('modules', 'public');

        Module::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
    
        // Generate the folder path dynamically based on the module ID
        $folderPath = "data/module_{$module->id}/index.html";
    
        // Check if the module folder exists, if not, return a 404 or custom message
        if (!file_exists(public_path($folderPath))) {
            abort(404, 'Module content not found');
        }
    
        return view('modules.show', compact('module', 'folderPath'));
    }

    
}
