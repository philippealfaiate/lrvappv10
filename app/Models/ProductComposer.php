<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductComposer extends Pivot
{
    protected $table = 'product_composers';

    function composerElements() : HasMany
    {
        return $this->hasMany(ComposerElement::class, Composer::class);
    }
}
