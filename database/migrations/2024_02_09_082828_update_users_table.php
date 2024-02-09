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
        Schema::table('users', function ($table)
        {
            $table->string('surname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('sex')->nullable();
            $table->integer('citizenship')->nullable();
            $table->integer('doc_type')->nullable();
            $table->string('number')->nullable();
            $table->string('serial')->nullable();
            $table->date('validity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
