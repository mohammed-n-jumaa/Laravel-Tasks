<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::all();
        return view('admin.actors.index', compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Actor::create($validated);

        return redirect()->route('admin.actors.index')->with('success', 'Actor created successfully.');
    }

    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $actor->update($validated);

        return redirect()->route('admin.actors.index')->with('success', 'Actor updated successfully.');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('admin.actors.index')->with('success', 'Actor deleted successfully.');
    }
}
