<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()->latest('id')->paginate(10);


        return ApiResponse::colection('projects', $projects);

        // return response()->json([
        //     'projects' => $projects
        // ], Response::HTTP_OK);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $project = Project::create($request->validated());

            return ApiResponse::success(
                'Create Project Success',
                'project',
                $project,
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
    public function show(string $id)
    {
        try {
            $project = Project::findOrFail($id);

            return response()->json($project, Response::HTTP_OK);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            if ($e instanceof ModelNotFoundException) {

                return ApiResponse::notFound('Project Not Found');
            }

            return ApiResponse::serverError('Server Error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        try {
            $project = Project::findOrFail($id);

            $project->update($request->validated());

            return ApiResponse::success(
                'Update project success',
                'project',
                $project
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::notFound('Project Not Found');
            }

            return ApiResponse::serverError('Server Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $project = Project::findOrFail($id);

            $project->delete();

            return ApiResponse::delete(
                'Delete project success',
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            if ($e instanceof ModelNotFoundException) {
                return ApiResponse::notFound('Project Not Found');
            }

            return ApiResponse::serverError('Server Error');
        }
    }
}
