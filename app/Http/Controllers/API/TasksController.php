<?php

namespace App\Http\Controllers\API;

use App\Enums\Tasks\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreRequest;
use App\Http\Requests\Tasks\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TasksController extends Controller
{
    public function index()
    {
        return response()->json(TaskResource::collection(
            Task::query()
                ->when(!request()->boolean('all', false), function (Builder $query) {
                    return $query->where('status', Status::NEW->name);
                })
                ->get()
        ));
    }

    public function store(StoreRequest $request)
    {
        /** @var Task $task */
        $task = Task::create([
            'status' => Status::NEW,
            ...$request->validated()
        ]);

        return response()->json(TaskResource::make($task));
    }

    public function show(Task $task)
    {
        return response()->json(TaskResource::make($task));
    }

    public function update(UpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return response()->json(TaskResource::make($task));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(TaskResource::make($task));
    }
}
