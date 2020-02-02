<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BidResource extends JsonResource
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
            'id'=>$this->project->id,
            'project_title'=>$this->project->project_title,
            'project_description'=>$this->project->project_description,
            'time_for_delivery'=>$this->project->time_for_delivery,
            'estimated_cost'=>$this->project->estimated_cost,
            'delivery_date'=>$this->project->delivery_date,
            'project_status'=>$this->project->project_status,
            'origin_address'=>$this->project->origin_address,
            'destination_address'=>$this->project->destination_address,
            'created_at'=>$this->created_at->diffForHumans()
        ];
    }
}
