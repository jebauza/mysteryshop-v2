<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Response;
use App\Http\Resources\EnterpriseResource;
use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseResquest;
use Exception;


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
        return EnterpriseResource::collection(Enterprise::orderBy('id', 'DESC')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEnterpriseRequest $request
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
     * @param Enterprise $enterprises
     * @return JsonResource
     */
    public function show(Enterprise $enterprises)
    {
        return new EnterpriseResource($enterprises);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEnterpriseResquest $request
     * @param Enterprise $enterprises
     * @return JsonResource
     */
    public function update(UpdateEnterpriseResquest $request, Enterprise $enterprises)
    {
        $enterprises->fill($request->all())->save();

        return new EnterpriseResource($enterprises);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $enterprises
     * @return Response
     * @throws Exception
     */
    public function destroy( $id)
    {
        $enterprise=Enterprise::findOrFail($id);
        return new Response($enterprise->delete());
    }
}
