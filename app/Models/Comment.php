<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'post_id', 'content', 'parent_id',
    ];

    public function children()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo (User::class, 'user_id', 'id');
    }
}