<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        'name' => 'required|max:255',
        'project_id' => 'required',
        'due_date' => 'nullable',
        'priority' => 'nullable|numeric|min:1|max:100',
    ]);
    $task = new Task();
    $task->name = $validatedData['name'];
    $task->project_id = $validatedData['project_id'];
    $task->due_date = $validatedData['due_date'];
    $task->priority = $validatedData['priority'];
    $task->save();

    return redirect()->route('projects.show', $task->project_id)->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $task = Task::find($id);
        // $project = Project::find($task->project_id);
        // $task->delete();
        // return redirect()->route('projects.show', $project->id)->with('success', 'Task deleted successfully!');
    }
    public function start($id)
    {
        $task = Task::find($id);
        $task->status = 'in_progress';
        $task->save();
        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task started successfully!');
    }
    public function end($id)
    {
        $task = Task::find($id);
        $task->status = 'done';
        $task->save();
        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task ended successfully!');
    }
    public function kill($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task deleted successfully!');
    }
}
