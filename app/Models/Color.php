<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hex_code'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($color) {

            if ($color->variants()->exists()) {
                throw new \Exception('No puede eliminar este registro porque tiene productos asociados.');
            }

        });
    }
}
