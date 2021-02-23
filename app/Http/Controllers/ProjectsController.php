<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = Project::all();

		return view('projects.index', compact('projects'));

    }

    public function store()
    {

    	$attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        $attributes['owner_id'] = auth()->id();

        // auth()->user()->projects()->create($attributes);

    	Project::create($attributes);

    	return redirect('/projects');
    }

    public function show($project)
    {   
<<<<<<< HEAD
        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }
=======
        $project = Project::findOrFail($project);
>>>>>>> 28c78127c2086fd60c006692250c29013194d3a3

        return view('projects.show', compact('project'));
    }
}
