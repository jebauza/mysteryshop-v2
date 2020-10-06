<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndicatorRequest;
use App\Http\Requests\UpdateIndicatorRequest;
use App\Http\Resources\IndicatorResource;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;


class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return IndicatorResource::collection(Indicator::orderBy('name')->paginate());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreIndicatorRequest  $request
     * @return JsonResource
     */
    public function store(StoreIndicatorRequest $request)
    {
        $indicator = Indicator::create($request->all());

        return new IndicatorResource($indicator);
    }

    /**
     * Display the specified resource.
     *
     * @param  Indicator  $indicator
     * @return JsonResource
     */
    public function show(Indicator $indicator)
    {
        return new IndicatorResource($indicator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateIndicatorRequest  $request
     * @param  Indicator  $indicator
     * @return JsonResource
     */
    public function update(UpdateIndicatorRequest $request, Indicator $indicator)
    {
        $indicator->fill($request->all())->save();

        return new IndicatorResource($indicator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Indicator  $indicator
     * @return Response
     */
    public function destroy(Indicator $indicator)
    {
        return new Response($indicator->delete());
    }
}
