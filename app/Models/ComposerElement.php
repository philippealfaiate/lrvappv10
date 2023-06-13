<?php

namespace App\Models;

use App\Models\Helpers\Columns;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComposerElement extends Model
{
    use HasFactory;
    use Columns;

    protected $fillable = [];
    
    protected $hidden = [];
    
    protected $casts = [];
    
    // public $timestamps = false;
    
}
