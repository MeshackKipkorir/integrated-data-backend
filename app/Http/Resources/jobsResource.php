<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class jobsResource extends JsonResource
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
        'id' => $this->id,
        'ministry'=>$this->ministry,
        'advert_no'=>$this->advert_no,
        'department'=>$this->department,
        'post'=>$this->post,
        'job_group'=>$this->job_group,
        'vacancies'=>$this->vacancies,
        'closing_date'=>$this->closing_date,
        'created_at'=>(string)$this->created_at,
        'updated_at'=>(string)$this->updated_at,
      ];
    }
}
