<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Task\TaskCollection;
use App\Http\Resources\Task\TaskResource;
use App\TaskModel\Task;
use App\Http\Traits\ApiResponseTrait;

class TaskController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskCollection::collection(Task::paginate(20));
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
            'owner'  => 'required|string',
            'task' => 'required|string',
            'date'     => 'required|date',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date',
        ]);  

        $task = new Task;
        $task->owner = $request->owner;
        $task->task = $request->task;
        $task->date = $request->date;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;
        $task->save();
        return $this->apiCreatedDataResponse(new TaskResource($task));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return $this->apiCreatedDataResponse(new TaskResource($task));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return $this->apiDeleteResponse();
    }
}
