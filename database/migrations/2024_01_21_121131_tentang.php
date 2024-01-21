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
        Schema::create('tentang', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->foreignId('category_tentang_id');
            $table->text('image_tentang');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
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
