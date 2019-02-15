<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $guarded = [];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
