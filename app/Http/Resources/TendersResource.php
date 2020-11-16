<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TendersResource extends JsonResource
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
            'id' => $this-> id,
          'org_name' => $this-> org_name,
          'type' => $this-> type,
          'telephone' => $this-> telephone,
          'email' => $this-> email,
          'physical_address' => $this-> physical_address,
          'created_at' => $this-> created_at,
          'tender_id' => $this-> tender_id,
          'tender_type' => $this-> tender_type,
          'tender_title' => $this-> tender_title,
          'tender_category' => $this-> tender_category,
          'tender_ref_no' => $this-> tender_ref_no,
          'publication_date' => $this-> publication_date,
          'tender_status' => $this-> tender_status,
          'org_id' => $this-> org_id,
          'year' => $this-> year,
          'month' => $this-> month,
          'tender_code' => $this-> tender_code,
          'closing_date' => $this-> closing_date,
        ];
    }
}
