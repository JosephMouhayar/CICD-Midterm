<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
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

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
