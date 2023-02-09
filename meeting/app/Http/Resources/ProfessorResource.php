<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'professor';
    public function toArray($request)
    {
        
        return [
            'first_name' =>$this->resource->first_name,
            'last_name' =>$this->resource->last_name,
            'title'=>$this->resource->title,
            'department'=>$this->resource->department,
            'faculty'=>$this->resource->faculty,
        ];
    }
}
