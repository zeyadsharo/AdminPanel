<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'attribute_value', 'attribute_type_id'];

    public function attributeType()
    {
        return $this->belongsTo(AttributeTypeLookUp::class, 'attribute_type_id', 'id');
    }
}
