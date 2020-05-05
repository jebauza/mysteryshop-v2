<?php

namespace App\Http\Controllers\API;

use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Http\Resources\EnterpriseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnterprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return new EnterpriseResource(Enterprise::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enterprise  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enterprise  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enterprise  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprises)
    {
        //
    }
}
