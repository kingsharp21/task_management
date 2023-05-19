<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = new TaskCollection(Task::orderBy('priority')->get()); 

        $tasks = Task::leftJoin('task_projects', 'task_projects.task_id', '=', 'tasks.id')
            ->leftJoin('projects', 'projects.id', '=', 'task_projects.project_id')
            ->select('tasks.id', 'task_name', 'priority', 'start_date', 'end_date', 'projects.project_name')->orderBy('priority')->get();
        // print($tasks);
        $projects = Project::get();

        return view('index')->with(['tasks' => $tasks, 'projects' => $projects]);
    }

    public function create()
    {
        return view('create');
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|string|max:100',
            'priority' => 'required|integer|max:20',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response(["status" => "error", 'message' => $validator->errors()->all()], 422);
        }

        Task::create($request->toArray());
        return redirect('/')->with('success', "task created successfully!");
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit')->with(['id' => $id, 'task' => $task]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|string|max:100',
            'priority' => 'required|integer|max:20',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return response(["status" => "error", 'message' => $validator->errors()->all()], 422);
        }
        $updateTask = Task::find($request->id);
        $updateTask->update(['task_name' => $request->task_name, 'priority' => $request->priority, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        return redirect('/')->with('success', "Task updated successfully!");
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('success', "task deleted successfully!");
    }
}
