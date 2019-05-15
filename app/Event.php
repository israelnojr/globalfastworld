<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function Products()
    {
        return $this->belongsTo('App\Product');
    }
}
