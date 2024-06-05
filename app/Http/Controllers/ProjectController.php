<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200|min:2',
            'description' => 'nullable|max:1000',
            'link_git' => 'max:1000',
            
        ]);

        

        $form_data = $request->all();
        $slug = Str::slug($form_data['name']);
        $form_data['slug'] = $slug;

        $new_project = Project::create($form_data);

        

        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show',compact('project'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:200|min:2',
            'description' => 'nullable|max:1000',
            'link_git' => 'nullable|max:1000',
            
        ]);
        
        $form_data = $request->all();

        $project->fill($form_data);

        $project->save();

        return view('admin.projects.show', compact('project')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}
