<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($projectId)
    {
        $tasks = Task::query()
            ->where('project_id', $projectId)
            ->latest('id')
            ->get();

        return ApiResponse::colection('tasks', TaskResource::collection($tasks));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, $projectId)
    {
        try {
            $project = Project::find($projectId);

            if (!$project) {
                return ApiResponse::notFound('Project Not Found');
            }

            $task =  $project->tasks()->create($request->validated());

            return ApiResponse::success(
                'Task created success',
                'task',
                new TaskResource($task),
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return ApiResponse::serverError('Server Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $taskId)
    {
        try {
            $task = Task::findOrFail($taskId);

            return response()->json([new TaskResource($task)], Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::notFound('Task Not Found');
            }

            return ApiResponse::serverError('Server Error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id, $taskId)
    {
        try {
            $task = Task::findOrFail($taskId);

            $task->update($request->validated());

            return ApiResponse::success(
                'Update task success',
                'task',
                new TaskResource($task)
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::notFound('Task Not Found');
            }

            return ApiResponse::serverError('Server Error');
        }
    }

    public function destroy(string $id, $taskId)
    {
        try {
            $task = Task::findOrFail($taskId);

            $task->delete();

            return ApiResponse::delete('Task Delete Success', Response::HTTP_OK);
        } catch (\Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::notFound('Task Not Found');
            }
            return ApiResponse::serverError('Server Error');
        }
    }
}
