<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'taxonomy_id',
        'type_id',
        'name',
        'slug',
        'sku_base',
        'short_description',
        'description',
        'technical_specs',
        'price',
        'sale_price',
        'image',
        'featured',
        'is_new',
        'is_active'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
