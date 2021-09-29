<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalAttribute() {
        $total = 0;
        foreach($this->cartItems as $cartItem) {
            $total += $cartItem->item_total;
        }

        return $total;
    }

}
