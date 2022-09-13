<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all projects with name
        $leader_id = Auth::user()->id;
        $projects = Project::where('leader_id', $leader_id)->get();
        return view('home', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leader_id = Auth::user()->id;
        return view('project.create', compact('leader_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'string|required',
            'owner' => 'string|required',
            'leader_id' => 'integer|required',
            'deadline' => 'date|required',
            'progress' => 'integer|required',
            'description' => 'string|required',
        ]);

        Project::create($data);
        return redirect()->route('project.index')->with(["alert:title" => "Sukses", "alert:content" => "menambahkan project baru ke dalam database", "alert:status" => "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get detail project
        $project = Project::find($id);

        // Get tasks 
        $tasks = Task::where('project_id', $id)->get();
        $tasks_done = 0;
        $tasks_on_progress = 0;
        $tasks_pending = 0;

        // filter
        foreach($tasks as $task) {
            if ( $task->status == "DONE" ) $tasks_done++;
            else if ( $task->status == "ON PROGRESS" ) $tasks_on_progress++;
            else $tasks_pending++;
        }

        return view('project.index', compact(['project', 'tasks', 'tasks_done', 'tasks_on_progress', 'tasks_pending']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
