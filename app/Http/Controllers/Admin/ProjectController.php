<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'technology'       => 'required|string|max:255',
            'client_country'   => 'nullable|string|max:100',
            'image'            => 'nullable|image|max:2048',
            'project_url'      => 'nullable|url',
            'github_url'       => 'nullable|url',
            'category'         => 'required|in:ai,web,enterprise,mobile,other',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'sort_order'       => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'technology'       => 'required|string|max:255',
            'client_country'   => 'nullable|string|max:100',
            'image'            => 'nullable|image|max:2048',
            'project_url'      => 'nullable|url',
            'github_url'       => 'nullable|url',
            'category'         => 'required|in:ai,web,enterprise,mobile,other',
            'is_featured'      => 'boolean',
            'is_active'        => 'boolean',
            'sort_order'       => 'integer',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($project->image) { Storage::disk('public')->delete($project->image); }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->image) { Storage::disk('public')->delete($project->image); }
        $project->delete();
        return back()->with('success', 'Project deleted successfully!');
    }
}
