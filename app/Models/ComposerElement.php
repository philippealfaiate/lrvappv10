<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ComposerElement extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        'model_id',
        'model_type',
    ];
    
    protected $hidden = [];
    
    protected $casts = [];

    // public $timestamps = false;

    public function morphable(): MorphTo
    {
        return $this->morphTo('model');
    }

    function offers() : HasManyThrough
    {
        return $this->hasManyThrough(Offer::class, Product::class, 'id');    
    }
}
