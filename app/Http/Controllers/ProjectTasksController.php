<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store()
    {
    	$project->addTask(request('body'));

    	return redirect($project->path());
    }
}
