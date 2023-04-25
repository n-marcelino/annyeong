<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'user_id', 'stock', 'description', 'photo', 'category', 'fandom'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query -> where('name' , 'like', '%' . request('search') . '%')
            ->orWhere('category', 'like', '%' . request('search') . '%')
            ->orWhere('fandom', 'like', '%' . request('search') . '%');
        }
    }
     //relationship to user
     public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    //relationship to orders
    public function orders()
    {
    return $this->hasMany(Order::class);
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

}
