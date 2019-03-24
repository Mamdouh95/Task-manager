<?php
/**
* @author Mamdouh Magdy <mamdouhmagdy95@gmail.com>
*/
namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display List of resource
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $squad = User::all(); // It should have all users in this team on the task manager
        $tasks = [
            'todos' => Task::todos()->paginate(10),
            'in_progress' => Task::inprogress()->paginate(10),
            'review' => Task::review()->paginate(10),
            'done' => Task::done()->paginate(10),
        ];
        return view('tasks.index', compact('squad', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTask $request)
    {
        Task::create(array_merge(['created_by' => Auth::id()], $request->only('title', 'description', 'priority')));
        return response()->json(['msg' => 'Task created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
