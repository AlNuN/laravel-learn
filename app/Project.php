<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $guarded = [];


    // Relationship with User
    public function owner () {

        return $this->belongsTo(User::class);

    }


    // Relationship with Task Model
    public function tasks(){

        return $this->hasMany(Task::class);

    }

    public function addTask($task){

        /* 
            We're instatiating a task object within a project object, so, laravel gets the project id of the project 
            and put on project_id column of the task table. Therefore, we need only to adress the description field,
            since completed field has a predefined value of 0 (false)
            We could just use this line  in the controller, but this is for the sake of encapsulation
        */

        $this->tasks()->create($task);

    }
}
