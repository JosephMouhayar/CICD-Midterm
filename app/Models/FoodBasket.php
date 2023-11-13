<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodBasket extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'quantity'
    ];

    public function foods()
    {
        return $this->belongsTo(Food::class);
    }

    public function baskets()
    {
        return $this->belongsTo(Basket::class);
    }
}
