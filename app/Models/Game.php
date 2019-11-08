<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Uuid;

class Game extends Model
{
    //

    use Uuid;

    protected $guarded = ['created_at','updated_at'];

    protected $casts = [
        'json_cells'    =>  'array'
    ];

    public function scopeActive($query){
        return $query->where('current_state','active');
    }
}
