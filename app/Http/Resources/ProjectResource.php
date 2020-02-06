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
        if($this->transferista_id != null){
           $transferita_name =  $this->transferista->name;
        }else{
            $transferita_name = null;
        }
        return [
            'id'=> $this->id,
            'title'=>$this->title,
            'origin_address'=>$this->origin_address,
            'transferista_name'=> $transferita_name,
            'origin_town'=> $this->origin_town,
            'origin_country'=>$this->origin_country,
            'origin_lng'=>$this->origin_lng,
            'origin_lat'=>$this->origin_lat,
            'destination_address'=> $this->destination_address,

            'destination_town'=> $this->destination_town,
            'destination_country'=>$this->destination_country,
            'destination_lng'=>$this->destination_lng,
            'destination_lat'=>$this->destination_lat,
            'project_title'=> $this->project_title,
            'project_description'=>$this->project_description,
            'project_size'=>$this->project_size,
            'project_status'=>$this->project_status,
            'created_at'=>$this->created_at->diffForHumans(),
            'user'=>$this->user->name
        ];
    }
}
