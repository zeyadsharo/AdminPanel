<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_description', 'image', 'product_name','price'];
    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attribute::class, 'product_id', 'id');
    }
}
