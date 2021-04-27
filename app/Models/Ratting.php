<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratting extends Model
{
    use HasFactory;

    protected $table = 'user_ratting';

    protected $fillable = [
        'user_name', 'content', 'star_number', 'score',
    ];
}
