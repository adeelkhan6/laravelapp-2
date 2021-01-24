<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Task;
use\App\Project;
class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        $attributes = request()->validate(['description' => 'required']);
        $project->addTask($attributes);

        // $project->addTask(request('description'));
        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);
        return back();
    }

    public function update(Task $task)
    {
        if (request()->has('completed')) {
            $task->complete();
        } else {
            $task->incomplete();
        }
        
        $task->complete(request()->has('completed'));  // orignal

        request()->has('completed') ? $task->complete() : $task->incomplete();

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->method();
        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);

        return back();
    }

}
