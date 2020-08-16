<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentEvaluation;
use App\Http\Resources\DepartmentEvaluationResource;
use App\Http\Requests\StoreDepartmentEvaluationRequest;
use App\Http\Requests\UpdateDepartmentEvaluationRequest;
use Illuminate\Http\Resources\Json\JsonResource;


class DepartmentEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return DepartmentEvaluationResource::collection(DepartmentEvaluation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResource
     */
    public function store(StoreDepartmentEvaluationRequest $request)
    {
        $newDepartEvaluation = DepartmentEvaluation::create($request->all());

        return new DepartmentEvaluationResource($newDepartEvaluation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentEvaluation  $departmentEvaluation
     * @return JsonResource
     */
    public function show(DepartmentEvaluation $departmentEvaluation)
    {
        return new DepartmentEvaluationResource($departmentEvaluation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentEvaluation  $departmentEvaluation
     * @return JsonResource
     */
    public function update(UpdateDepartmentEvaluationRequest $request, DepartmentEvaluation $departmentEvaluation)
    {
        $departmentEvaluation->fill($request->all())->save();

        return new DepartmentEvaluationResource($departmentEvaluation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartmentEvaluation  $departmentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentEvaluation $departmentEvaluation)
    {
        $departmentEvaluation->delete();

        return response()->json(['messenge'=>'OK'], 200);
    }
}
