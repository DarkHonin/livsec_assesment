<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groceries extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'quantity',
        'checked',
        'user_id'
    ];
}
