<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $user = auth()->user();
            $projects = $user->projects()->with('tasks')->get();
            return view('projects.index', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);

    auth()->user()->projects()->create($validatedData);

    return redirect()->route('projects.index')->with('success', 'Project created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        $tasks = $project->tasks;
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');   

    }



     public function editt($id)
    {
        //
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }


    public function updatte(Request $request,$id)
    {
        $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);
        $to_update=Project::find($id);
        $to_update->title = $validatedData['title'];
        $to_update->description = $validatedData['description'];
        $to_update->save();
    return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }



}
