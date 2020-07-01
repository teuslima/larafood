<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
   
     /**
     * Controla o retorno dos dados
     */

    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'logo' => $this->logo ? url("storage/$this->logo") : '',
            'uuid' => $this->uuid,
            'flag' => $this->flag,
            'contact' => $this->contact,
            'data_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
