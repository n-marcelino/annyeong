<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'description', 'Category_ID', 'Fandom_ID', 'Seller_ID'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['search'] ?? false) {
            $query -> where('name' , 'like', '%' . request('search') . '%');
        }
    }
}
