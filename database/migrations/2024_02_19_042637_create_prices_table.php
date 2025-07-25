<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Price;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('regular_price_rub');
            $table->decimal('regular_price_eur');
            $table->decimal('discount_price_rub')->nullable();
            $table->decimal('discount_price_eur')->nullable();
        });

        Price::query()->create([
            'regular_price_rub'  => 699,
            'discount_price_rub' => 698,
            'regular_price_eur'  => 14,
            'discount_price_eur' => 13
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
