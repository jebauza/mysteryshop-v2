<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentTypeRequest;
use App\Http\Requests\UpdateEstablishmentTypeRequest;
use App\Http\Resources\EstablishmentTypeResource;
use Exception;
use App\Models\EstablishmentType;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class EstablishmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return EstablishmentTypeResource::collection(EstablishmentType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstablishmentTypeRequest $request
     * @return JsonResource
     */
    public function store(StoreEstablishmentTypeRequest $request)
    {
        $enterprise = EstablishmentType::create($request->all());

        return new EstablishmentTypeResource($enterprise);
    }

    /**
     * Display the specified resource.
     *
     * @param EstablishmentType $establishmentType
     * @return JsonResource
     */
    public function show(EstablishmentType $establishmentType)
    {
        return new EstablishmentTypeResource($establishmentType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstablishmentTypeRequest $request
     * @param EstablishmentType $establishmentType
     * @return JsonResource
     */
    public function update(UpdateEstablishmentTypeRequest $request, EstablishmentType $establishmentType)
    {
        $establishmentType->fill($request->all())->save();

        return new EstablishmentTypeResource($establishmentType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EstablishmentType $establishmentType
     * @return Response
     * @throws Exception
     */
    public function destroy(EstablishmentType $establishmentType)
    {
        return new Response($establishmentType->delete());

    }
}
