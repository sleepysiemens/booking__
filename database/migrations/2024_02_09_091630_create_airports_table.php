<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('iata_type')->nullable();
            $table->text('code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('airport_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
