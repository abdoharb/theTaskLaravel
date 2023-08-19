<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => [
                'required',
                'string'
            ],
            'taskTime' => ['required']
        ]);


        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->taskTime = $request->taskTime;

        if($task->save()){
            return redirect()->back()->with(['success' => __('Success create the task')]);

        }

        return redirect()->back()->with(['error' => __('Failed to create the task')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('task/view', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task/edit', compact('task'));
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
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => [
                'required',
                'string'
            ],
            'taskTime' => ['required']
        ]);


        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->taskTime = $request->taskTime;

        if($task->save()){
            return redirect()->back()->with(['success' => __('Success save the task')]);

        }

        return redirect()->back()->with(['error' => __('Failed to save the task')]);
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

        return redirect()->back()->with(['success' => __('Success delete the task')]);
    }
}
