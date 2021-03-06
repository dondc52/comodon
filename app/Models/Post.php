<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title', 'content', 'image', 'cat_id', 'user_id', 'like_number', 'view_number', 'comment_number',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function cat(){
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }
}
