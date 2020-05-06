<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Http\Resources\EnterpriseResource;
use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\updateEnterpriseResquest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return EnterpriseResource::collection(Enterprise::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResource
     */
    public function store(StoreEnterpriseRequest $request)
    {
        $enterprise = Enterprise::create($request->all());

        return new EnterpriseResource($enterprise);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Enterprise $enterprises
     * @return JsonResource
     */
    public function show(Enterprise $enterprises)
    {
        return new EnterpriseResource($enterprises);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enterprise $enterprises
     * @return JsonResource
     */
    public function update(updateEnterpriseResquest $request, Enterprise $enterprises)
    {
        $enterprises->fill($request->all())->save();

        return new EnterpriseResource($enterprises);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Enterprise $enterprises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprises)
    {
       return new Response($enterprises->delete());
    }
}
