<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id'=> $this->id,
            'title'=>$this->title,
            'origin_address'=>$this->origin_address,

            'origin_town'=> $this->origin_town,
            'origin_country'=>$this->origin_country,

            'destination_address'=> $this->destination_address,

            'destination_town'=> $this->destination_town,
            'destination_country'=>$this->destination_country,

            'project_title'=> $this->project_title,
            'project_description'=>$this->project_description,
            'project_size'=>$this->project_size,
            'created_at'=>$this->created_at->diffForHumans(),
            'user'=>$this->user->name
        ];
    }
}
