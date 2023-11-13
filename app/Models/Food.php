<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'name',
        'description',
        'calorieCount',
        'price',
        'isPlatDuJour',
        'idCategory',
        'offer'
    ];

    public function user_apps()
    {
        return $this->belongsTo(UserApp::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function foodbaskets()
    {
        return $this->hasMany(FoodBasket::class);
    }
}
