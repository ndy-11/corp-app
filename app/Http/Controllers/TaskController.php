<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $req)
    {
        $q = Task::with('assignee:id,name');
        if ($req->status) $q->where('status', $req->status);
        if ($req->priority) $q->where('priority', $req->priority);
        if ($req->search) $q->where('title', 'like', '%' . $req->search . '%');
        $tasks = $q->latest()->paginate(10)->appends($req->query());
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        $users = User::orderBy('name')->get(['id', 'name']);
        return view('tasks.create', compact('users'));
    }
    public function store(TaskRequest $req)
    {
        $task = Task::create($req->validated());
        return redirect()->route('tasks.show', $task)->with('success', 'Task created');
    }
    public function show(Task $task)
    {
        $task->load('assignee:id,name');
        return view('tasks.show', compact('task'));
    }
    public function edit(Task $task)
    {
        $users = User::orderBy('name')->get(['id', 'name']);
        return view('tasks.edit', compact('task', 'users'));
    }
    public function update(TaskRequest $req, Task $task)
    {
        $task->update($req->validated());
        return redirect()->route('tasks.show', $task)->with('success', 'Task updated');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }
    public function changeStatus(Request $req, Task $task)
    {
        $req->validate(['status' => 'required|in:pending,in_progress,completed']);
        $task->update(['status' => $req->status]);
        return redirect()->route('tasks.show', $task)->with('success', 'Task status updated');
    }
    public function changePriority(Request $req, Task $task)
    {
        $req->validate(['priority' => 'required|in:low,medium,high']);
        $task->update(['priority' => $req->priority]);
        return redirect()->route('tasks.show', $task)->with('success', 'Task priority updated');
    }
}
