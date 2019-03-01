<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];
    public function product()
    {
        $this->hasOne(Product::class);
    }
}
