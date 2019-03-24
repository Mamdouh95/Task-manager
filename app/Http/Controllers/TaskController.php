<?php
/**
* @author Mamdouh Magdy <mamdouhmagdy95@gmail.com>
*/
namespace App\Http\Controllers;

use App\Http\Requests\ChangeTaskStatus;
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
     * @param CreateTask|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTask $request)
    {
        $task = Task::create(array_merge(['created_by' => Auth::id()], $request->only('title', 'description', 'priority')));
        $card = view('tasks.card', compact('task'))->render();
        return response()->json(['msg' => 'Task created successfully', 'card' => $card], 200);
    }

    public function view(Task $task)
    {
        return response()->json($task->only('title', 'description', 'priority'), 200);
    }

    /**
     * @param ChangeTaskStatus $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(ChangeTaskStatus $request, Task $task)
    {
        $task->update(['status' => $request->status]);
        return response()->json([], 200);
    }
}
