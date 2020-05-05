<?php

namespace App\Http\Controllers\API;

use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\updateEnterpriseResquest;
use App\Http\Resources\EnterpriseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
     * @param \App\Enterprise $enterprises
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
     * @param \App\Enterprise $enterprises
     * @return \Illuminate\Http\Response
     */
    public function update(updateEnterpriseResquest $request, Enterprise $enterprises)
    {
        $enterprises->fill($request->all())->save();

        return new EnterpriseResource($enterprises);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Enterprise $enterprises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprises)
    {
        //
    }
}
