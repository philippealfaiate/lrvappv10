<?php

use App\Models\Offer;
use App\Models\ComposerElement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_composer_elements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Offer::class);
            $table->foreignIdFor(ComposerElement::class);
            $table->morphs('model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_composer_elements');
    }
};
