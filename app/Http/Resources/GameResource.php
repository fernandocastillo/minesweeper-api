<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'uuid'  => $this->uuid,
            'current_state'  => $this->current_state,
            'rows'  => (int)$this->rows,
            'cols'  => (int)$this->cols,
            'mines'  => (int)$this->mines,
            'total_time'  => $this->total_time,
            'cells'  => $this->json_cells,
        ];
    }
}
