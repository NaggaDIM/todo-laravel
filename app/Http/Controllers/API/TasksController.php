<?php

namespace App\Http\Controllers\API;

use App\Enums\Tasks\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    /**
     * Список задач
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(TaskResource::collection(
            Task::query()
                ->when(!request()->boolean('all', false), function (Builder $query) {
                    return $query->where('status', Status::NEW->name);
                })
                ->get()
        ));
    }

    /**
     * Создание задачи
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        /** @var Task $task */
        $task = Task::create(['status' => Status::NEW, ...$request->validated()]);

        return response()->json(TaskResource::make($task));
    }

    /**
     * Просмотр задачи
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json(TaskResource::make($task));
    }

    /**
     * Редактирование задачи
     * @param TaskRequest $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return response()->json(TaskResource::make($task));
    }

    /**
     * Пометка задачи выполненной
     * @param Task $task
     * @return JsonResponse
     */
    public function done(Task $task): JsonResponse
    {
        $task->update(['status' => Status::DONE]);

        return response()->json(TaskResource::make($task));
    }

    /**
     * Удаление задачи
     * @param Task $task
     * @return JsonResponse
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(TaskResource::make($task));
    }
}
