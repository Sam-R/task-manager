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
            'tasks' => Task::where('task_id', '=', null)->lists('name', 'id')->all(),
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
            'description' => 'required|string',
            'priority' => 'int',
            'status' => 'int',
            'parent' => 'int',
            'category' => 'int',
            'user' => 'int',
            'project' => 'required|int'
        ]);

        /*
         Here's a hack!
         We're referencing a foreign key for the parent ID.
         When there's no parent task, we want to add a row with a "null" entry for "task_id"
         When we've received the request, null equates to blank/empty, and you can't insert empty into a MySQL foreign key field, you have to insert NULL. This if statement checks to see if the field is empty, and resets it to NULL if it is.
        */
        $parent_task = $request->input('parent');
        if ( empty($parent_task) ) {
            $parent_task = NULL;
        }

        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->priority_id = $request->input('priority');
        $task->status_id = $request->input('status');
        $task->task_id = $parent_task;
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
        $task = Task::find($id);

        /*
        Define the "old" values for the select list...
        Only the text fields are set with the correct default values. To set the default values for the select list, we've got some hacking with array shifts to make the current task value for the dropdown appear at the top of the list and therefore be the default option on the edit screen.
        */
        $arr_categories = Category::lists('name', 'id')->all();
        $selected_category = $arr_categories[$task->category_id];
        array_unshift($arr_categories, $selected_category);

        $arr_priorities = Priority::lists('name', 'id')->all();
        $selected_priority = $arr_priorities[$task->priority_id];
        array_unshift($arr_priorities, $selected_priority);

        $arr_statuses = Status::lists('name', 'id')->all();
        $selected_status = $arr_statuses[$task->status_id];
        array_unshift($arr_statuses, $selected_status);

        $arr_tasks = Task::where('task_id', '=', null)->lists('name', 'id')->all();
        // If there's no task at the given index (eg null), don't bother setting a default value.
        if (array_key_exists($task->task_id, $arr_tasks)) {
            $selected_task = $arr_tasks[$task->task_id];
            array_unshift($arr_tasks, $selected_task);
        }

        $arr_users = User::lists('name', 'id')->all();
        $selected_user = $arr_users[$task->user_id];
        array_unshift($arr_users, $selected_user);

        $arr_projects =Project::lists('name', 'id')->all();
        $selected_project = $arr_projects[$task->project_id];
        array_unshift($arr_projects, $selected_project);

        return view('tasks.edit', [
            'categories' => $arr_categories,
            'priorities' => $arr_priorities,
            'statuses' => $arr_statuses,
            'tasks' => $arr_tasks,
            'users' => $arr_users,
            'projects' => $arr_projects,
            'task' => $task
        ]);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|string',
            'priority' => 'int',
            'status' => 'int',
            'parent' => 'int',
            'category' => 'int',
            'user' => 'int',
            'project' => 'required|int'
        ]);

        /*
         Here's a hack!
         We're referencing a foreign key for the parent ID.
         When there's no parent task, we want to add a row with a "null" entry for "task_id"
         When we've received the request, null equates to blank/empty, and you can't insert empty into a MySQL foreign key field, you have to insert NULL. This if statement checks to see if the field is empty, and resets it to NULL if it is.
        */
        $parent_task = $request->input('parent');
        if ( empty($parent_task) ) {
            $parent_task = NULL;
        }

        $task = Task::updateOrCreate(['id' => $id]);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->priority_id = $request->input('priority');
        $task->status_id = $request->input('status');
        $task->task_id = $parent_task;
        $task->category_id = $request->input('category');
        $task->user_id = $request->input('user');
        $task->project_id = $request->input('project');
        $task->save();

        Session::flash('flash_message', 'Task successfully saved!');

        return redirect()->route('tasks.index');
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
