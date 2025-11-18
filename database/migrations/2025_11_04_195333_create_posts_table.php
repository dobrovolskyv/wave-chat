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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('author')->index();
            $table->unsignedInteger('category');
            $table->text('title')->unique();
            $table->longText('content')->nullable();
            $table->string('image_path')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedSmallInteger('status')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('likes')->nullable();
            $table->unsignedInteger('views')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
