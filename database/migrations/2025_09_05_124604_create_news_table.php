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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('news_heading');
            $table->string('news_header_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('news_large_description')->nullable();
            $table->json('images')->nullable(); // multiple images stored as JSON
            $table->string('news_link')->nullable();
            $table->string('published_by')->nullable();
            $table->longText('content')->nullable();
            $table->string('category')->nullable();
            $table->string('tags')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->softDeletes(); // adds deleted_at
            $table->timestamps();  // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
