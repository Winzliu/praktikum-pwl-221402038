<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('home', [
            'tasks' => $tasks
        ]);
    }

    public function addTask(Request $request)
    {
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
        ]);

        Task::create([
            'task'    => $validation['task'],
            'tanggal' => NOW()
        ]);

        return redirect('/');
    }

    public function editTask(Request $request)
    {
        $task = Task::find($request->id);

        return view('edit', [
            'task' => $task
        ]);
    }

    public function updateTask(Request $request)
    {
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
        ]);

        Task::where('id', $request->id)->update([
            'task' => $validation['task']
        ]);

        return redirect('/');
    }

    public function deleteTask(Request $request)
    {
        Task::where('id', $request->id)->delete();
        return redirect('/');
    }

    public function showTask(Request $request)
    {
        $task = Task::find($request->id);
        $comments = $task->comments;

        return view('show', [
            'task'     => $task,
            'comments' => $comments
        ]);
    }
}
