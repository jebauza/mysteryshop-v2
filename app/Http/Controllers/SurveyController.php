<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return SurveyResource::collection(Survey::orderBy('name')->paginate());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSurveyRequest  $request
     * @return JsonResource
     */
    public function store(StoreSurveyRequest $request)
    {
        $model = Survey::create($request->all());

        return new SurveyResource($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  Survey  $survey
     * @return JsonResource
     */
    public function show(Survey $survey)
    {
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Survey  $survey
     * @return JsonResource
     */
    public function update(Request $request, Survey $survey)
    {
        $survey->fill($request->all())->save();

        return new SurveyResource($survey);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Survey  $survey
     * @return Response
     */
    public function destroy(Survey $survey)
    {
        return new Response($survey->delete());
    }
}
