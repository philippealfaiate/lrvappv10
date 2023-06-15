<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [];
    
    protected $casts = [];

    // public $timestamps = false;
    
    function offers() : HasMany
    {
        return $this->hasMany(Offer::class);
    }

    function allergens() : HasMany
    {
        return $this->hasMany(allergen::class);
    }

    function description() : HasOne
    {
        return $this->hasOne(Description::class);
    }

    public function composerElements(): MorphMany
    {
        return $this->morphMany(ComposerElement::class, 'model');
    }

    function composers() : BelongsToMany
    {
        return $this->belongsToMany(Composer::class, 'product_composers');
    }

}
