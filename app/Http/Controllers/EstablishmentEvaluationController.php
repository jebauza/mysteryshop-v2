<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstablishmentEvaluation;
use App\Http\Resources\EstablishmentEvaluationResource;
use App\Http\Requests\StoreEstablishmentEvaluationRequest;
use App\Http\Requests\UpdateEstablishmentEvaluationRequest;
use Illuminate\Http\Resources\Json\JsonResource;


class EstablishmentEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return EstablishmentEvaluationResource::collection(EstablishmentEvaluation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResource
     */
    public function store(StoreEstablishmentEvaluationRequest $request)
    {
        $newEstabEvaluation = EstablishmentEvaluation::create($request->all());

        return new EstablishmentEvaluationResource($newEstabEvaluation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstablishmentEvaluation  $establishmentEvaluation
     * @return JsonResource
     */
    public function show(EstablishmentEvaluation $establishmentEvaluation)
    {
        return new EstablishmentEvaluationResource($establishmentEvaluation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstablishmentEvaluation  $establishmentEvaluation
     * @return JsonResource
     */
    public function update(UpdateEstablishmentEvaluationRequest $request, EstablishmentEvaluation $establishmentEvaluation)
    {
        $establishmentEvaluation->fill($request->all())->save();

        return new EstablishmentEvaluationResource($establishmentEvaluation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstablishmentEvaluation  $establishmentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstablishmentEvaluation $establishmentEvaluation)
    {
        $establishmentEvaluation->delete();

        return response()->json(['messenge'=>'OK'], 200);
    }
}
