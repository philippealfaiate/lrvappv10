<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferComposerElement extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        
    ];
    
    protected $hidden = [];
    
    protected $casts = [];
    
    // public $timestamps = false;
    
    public function morphable(): MorphTo
    {
        return $this->morphTo('model');
    }

    function composerElements() : HasMany
    {
        return $this->hasMany(ComposerElement::class);
    }
}
