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


        auth()->user()->projects()->create($attributes);

    	Project::create($attributes);

    	return redirect('/projects');
    }

    public function show($project)
    {  

        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }
        return view('projects.show', compact('project'));
    }

    public function create($project)
    {  
        return view('projects.crate');
    }
}
