<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Composer extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [];
    
    protected $casts = [];
    
    // public $timestamps = false;

    function ComposerElements() : HasMany
    {
        return $this->hasMany(ComposerElement::class);
    }
    
}
