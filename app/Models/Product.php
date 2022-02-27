<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'price', 'image_url', 'state', 'user_id'];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
