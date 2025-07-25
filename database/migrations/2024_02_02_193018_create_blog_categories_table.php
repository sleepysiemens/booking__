<?php

use App\Models\BlogCategory;
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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        $data = [
            ['name' => 'Путешествия'],
            ['name' => 'Наши новости'],
            ['name' => 'Визовый режим'],
        ];

        foreach ($data as $datum)
        {
            BlogCategory::query()->create($datum);

        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
