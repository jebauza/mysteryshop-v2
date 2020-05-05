<?php

namespace App\Http\Controllers\API;

use App\Enterprises;
use App\Http\Controllers\Controller;
use App\Http\Resources\EnterpriseResource;
use Illuminate\Http\Request;

class EnterprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        return new EnterpriseResource(Enterprises::all());
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
     * @param  \App\Enterprises  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprises $enterprises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enterprises  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprises $enterprises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enterprises  $enterprises
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprises $enterprises)
    {
        //
    }
}
