<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
           'task' => $task, 
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
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);
        
        return redirect('/');
    }

    public function show($id)
    {
        if (\Auth::check()) {
			$task = Task::find($id);
			
			if (\Auth::id() === $task->user_id) {
				$user = \Auth::user();
				
				return view('tasks.show', [
					'user' => $user,
				    'task' => $task,
				]);
			}
		}
		
		return redirect('/');
    }

    public function edit($id)
    {
        if (\Auth::check()) {
			$task = Task::find($id);
			
			if (\Auth::id() === $task->user_id) {
				$user = \Auth::user();
				
				return view('tasks.edit', [
					'user' => $user,
					'task' => $task,
				]);
			}
		}
		
		return redirect('/');
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
        $task = Task::find($id);
        
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
        ]);
        
        if (\Auth::id() === $task->user_id) {
			$task->update([
	            'content' => $request->content, 
	            'status' => $request->status, 
	        ]);
		}
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if(\Auth::id() === $task->user_id) {
            $task->delete();       
        }
        
        return redirect('/');
    }
}
