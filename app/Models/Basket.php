<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        
    ];

    public function user_apps()
    {
        return $this->belongsTo(UserApp::class);
    }

    public function foodbaskets()
    {
        return $this->hasMany(FoodBasket::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
