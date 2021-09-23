<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function stocks()
    // {
    //     return $this->hasMany(Stock::class);
    // }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Stock::class);
    }

}
