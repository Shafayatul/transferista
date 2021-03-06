<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=> $this->id,
            'first_name'=> $this->user->first_name,
            'last_name'=>$this->user->last_name,
            'name'=>$this->user->name,
            'phone'=> $this->phone,
            'email'=> $this->user->email,
            'transferista_email'=> $this->transferista->email,
        ];
    }
}
