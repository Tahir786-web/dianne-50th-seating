<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::latest()->paginate(12);
        return view('tables.index', compact('tables'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'flower_type' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'status'      => 'required|in:available,reserved,occupied',
            'capacity'    => 'required|integer|min:1|max:50',
        ]);

        Table::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'flower_type' => $request->flower_type,
            'description' => $request->description,
            'status'      => $request->status,
            'capacity'    => $request->capacity,
        ]);

        return redirect()->route('tables.index')->with('success', 'Table created successfully!');
    }

    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'flower_type' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'status'      => 'required|in:available,reserved,occupied',
            'capacity'    => 'required|integer|min:1|max:50',
        ]);

        $table->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'flower_type' => $request->flower_type,
            'description' => $request->description,
            'status'      => $request->status,
            'capacity'    => $request->capacity,
        ]);

        return redirect()->route('tables.index')->with('success', 'Table updated successfully!');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table deleted successfully!');
    }
}