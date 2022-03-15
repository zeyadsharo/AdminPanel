<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTypeLookUp extends Model
{
    use HasFactory;

    protected $table = 'attribute_type_lookups';
    protected $fillable = ['name'];

}
