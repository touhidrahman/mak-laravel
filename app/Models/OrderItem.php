<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    // public function color()
    // {
    //     return $this->hasOneThrough(Color::class, Stock::class);
    // }

    public function getUnitPriceFormattedAttribute() {
        return '€' . number_format($this->unit_price / 100, 2, ',', '.');
    }

    public function getSubtotalPriceFormattedAttribute() {
        return '€' . number_format($this->unit_price * $this->qty / 100, 2, ',', '.');
    }
}
