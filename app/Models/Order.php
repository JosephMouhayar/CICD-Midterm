<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'idUser',
        'totalPrice',
        'status',
        'location',
    ];

    public function user_apps()
    {
        return $this->belongsTo(UserApp::class);
    }

}
