<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Task;
use App\Project;
use App\Priority;
use App\Status;
use App\User;

// use session for session flash
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // We can't add any tasks without at least one project. Force the user to create a project if none exist.
        $projects = Project::all();
        if (count($projects) > 0) {
            return view('tasks.index', ['tasks' =>Task::with('children', 'status', 'priority', 'category', 'project')->get()]);
        } else {
            Session::flash('flash_message', 'Please create a Project before adding tasks!');
            return redirect()->route('projects.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create',  [
            'categories' => Category::lists('name', 'id'),
            'priorities' => Priority::lists('name', 'id'),
            'statuses' => Status::lists('name', 'id'),
            // We need to turn this into an array, not an object in order to allow nullable values
            // to do this, we call the "all()" function
            // Since it's going to make the UI so much easier without infinite children,
            // just load the tasks with no parents.
            'tasks' => ['' => 'None'] + Task::where('task_id', '=', null)->lists('name', 'id')->all(),
            'users' => User::lists('name', 'id'),
            'projects' => Project::lists('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => '',
            'priority' => 'int',
            'status' => 'int',
            'parent' => 'int',
            'category' => 'int',
            'user' => 'int',
            'project' => 'required|int'
        ]);

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->priority_id = $request->input('priority');
        $task->status_id = $request->input('status');
        $task->task_id = $request->input('parent');
        $task->category_id = $request->input('category');
        $task->user_id = $request->input('user');
        $task->project_id = $request->input('project');
        $task->save();

        Session::flash('flash_message', 'Task successfully saved!');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::with('project', 'priority', 'status', 'user')->find($id);

        return view('tasks.show', ['task' => $task]);
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
        $task = Task::findOrFail($id);

        $task->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');
    }
}
