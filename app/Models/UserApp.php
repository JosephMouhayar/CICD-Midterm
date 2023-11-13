<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApp extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'type',
        'status'
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function baskets()
    {
        return $this->hasOne(Basket::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ordersCooks()
    {
        return $this->hasMany(Order::class);
    }
}
