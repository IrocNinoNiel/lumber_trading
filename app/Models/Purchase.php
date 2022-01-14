<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'date',
        'status',
        'image',
        'user_id',
        'checkout_id',
        'payment_method_id',
    ];

    public function item(){
        return $this->hasMany(Item::class);
    }
}
