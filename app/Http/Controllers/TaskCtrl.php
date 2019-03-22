<?php

namespace fms\Http\Controllers;

use fms\Matter;
use fms\Task;
use Illuminate\Http\Request;
use Sentinel;

class TaskCtrl extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('system.tasks.view', compact('tasks'));
    }

    public function addTask($id)
    {
        $matter = Matter::findOrFail($id);

        return view('system.tasks.new', compact('matter'));
    }

    public function postTask(Request $request, $id)
    {
        $user = Sentinel::getUser()->email;

        $task = new Task();

        $task->matter_id = $id;
        $task->task_name = $request->input('task_name');
        $task->task_date = $request->input('task_date');
        $task->task_description = $request->input('task_description');
        $task->created_by = $user;
        $task->save();

    }
}
