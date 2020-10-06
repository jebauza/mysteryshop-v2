<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'contract'=>$this->contract_number,
            'enterprise'=>new EnterpriseResource($this->enterprise),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}
