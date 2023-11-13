<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'description'
    ];

    public function foods()
    {
        return $this->belongsTo(Food::class);
    }
    public function user_apps()
    {
        return $this->belongsTo(UserApp::class);
    }
}
