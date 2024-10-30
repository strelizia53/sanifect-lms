<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Correct import

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
        $folderPath = "data/module_{$module->id}/index.html";

        if (!file_exists(public_path($folderPath))) {
            abort(404, 'Module content not found');
        }

        return view('modules.show', compact('module', 'folderPath'));
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $categories = Category::all();

        return view('modules.edit', compact('module', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $module = Module::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('modules', 'public');
            $module->cover_image = $imagePath;
        }

        $module->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);

        if ($module->cover_image) {
            Storage::disk('public')->delete($module->cover_image); // Corrected usage
        }

        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
    
        // If the query is empty, redirect to the home page
        if (!$searchQuery) {
            return redirect()->route('home');
        }
    
        // Fetch modules that match the query
        $modules = Module::where('title', 'LIKE', '%' . $searchQuery . '%')->get();
        $categories = Category::all();
    
        return view('home', compact('modules', 'categories', 'searchQuery'));
    }
    

}
