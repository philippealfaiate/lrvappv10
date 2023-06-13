<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [
        'code',
        'has_traces',
    ];
    
    protected $hidden = [];
    
    protected $casts = [
        'has_traces' => 'boolean',
    ];
    
    // public $timestamps = false;
    
}
