<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\UpdateEstablishmentRequest;
use App\Http\Resources\EstablismentResource;
use App\Models\Establishment;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return EstablismentResource::collection(Establishment::orderBy('id', 'DESC')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstablishmentRequest $request
     * @return JsonResource
     */
    public function store(StoreEstablishmentRequest $request)
    {
        $enterprise = Establishment::create($request->all());

        return new EstablismentResource($enterprise);
    }

    /**
     * Display the specified resource.
     *
     * @param Establishment $establishment
     * @return JsonResource
     */
    public function show(Establishment $establishment)
    {
        return new EstablismentResource($establishment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstablishmentRequest $request
     * @param Establishment $establishment
     * @return JsonResource
     */
    public function update(UpdateEstablishmentRequest $request, Establishment $establishment)
    {
        $establishment->fill($request->all())->save();

        return new EstablismentResource($establishment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Establishment $establishment
     * @return Response
     * @throws Exception
     */
    public function destroy(Establishment $establishment)
    {
        return new Response($establishment->delete());
    }
}
