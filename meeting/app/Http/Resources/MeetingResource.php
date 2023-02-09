<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'meeting';
    
    public function toArray($request)
    {
        return[
            'id' =>$this->resource->id,
            'subject'=>$this->resource->subject,
            'room'=>$this->resource->room,
            'date'=>$this->resource->date,  
            'user'=>new UserResource($this->resource->user),
            'professor'=>new ProfessorResource($this->resource->professor)
        ];
    }
}
