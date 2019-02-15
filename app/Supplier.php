<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];
    public function supplies()
    {
        return $this->hasMany(Supplies::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
