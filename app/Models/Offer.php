<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Offer extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        'name',
        'attribute',
    ];
    
    protected $hidden = [];
    
    protected $casts = [];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [];

    // public $timestamps = false;

    protected function nameAttribute(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => is_null($attributes['attribute'])
                ? $attributes['name']
                : $attributes['name'] . " " . $attributes['attribute']
        );
    }

    /**
     * Undocumented function
     *
     * @return HasMany
     */
    function siblings() : HasMany
    {
        return $this->hasMany(Offer::class, 'product_id', 'product_id');
    }
    
    function description() : HasOneThrough
    {
        return $this->hasOneThrough(Description::class, Product::class, 'id')->withDefault();
    }

    function allergens() : HasManyThrough
    {
        return $this->hasManyThrough(Allergen::class, Product::class, 'id');
    }

    function composers() : HasManyThrough
    {
        return $this->hasManyThrough(Composer::class, ProductComposer::class, 'product_id',
		'id',
		'product_id',
		'composer_id');
    }

    function composerElements() : HasManyThrough
    {
        return $this->hasManyThrough(ComposerElement::class, ProductComposer::class, 'product_id',
		'id',
		'product_id',
		'composer_id');
    }
}
