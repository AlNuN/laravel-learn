<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    //

    public function update(Task $task){

        request()->has('completed') ? $task->complete() : $task->incomplete();

        return back();

    }

    public function store ( Project $project, Request $request) {


        $project->addTask(

            $request->validate([ 'description' => ['required', 'min:3']])

        );

        return back();

    }
}
