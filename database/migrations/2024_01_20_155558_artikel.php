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
        schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->foreignId('category_artikel_id');
            $table->text('image_artikel');
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
