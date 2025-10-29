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
            $table->string('name', 255); // Title of the news article
            $table->string('slug')->unique(); // URL-friendly version of title
            $table->text('contents'); // Main content of the article
            $table->text('teaser')->nullable(); // Short summary/excerpt
            $table->date('date'); // Publication date
            $table->enum('status', ['Published', 'Private'])->default('Private'); // Publication status
            $table->boolean('is_featured')->default(false); // Featured article flag
            $table->string('image_url', 500)->nullable(); // Main image URL or filename
            $table->string('thumbnail_url', 500)->nullable(); // Thumbnail image URL or filename
            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key to categories
            $table->unsignedBigInteger('user_id'); // Author of the article

            // SEO fields
            $table->string('meta_title', 60)->nullable(); // SEO title
            $table->text('meta_description')->nullable(); // SEO description
            $table->text('meta_keyword')->nullable(); // SEO keywords

            // Additional fields for customization
            $table->json('json')->nullable(); // Custom JSON data
            $table->text('styles')->nullable(); // Custom CSS styles

            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at for soft deletes

            // Indexes for better performance
            $table->index(['status', 'date']);
            $table->index(['category_id']);
            $table->index(['user_id']);
            $table->index(['is_featured']);
            $table->index(['slug']);

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('article_categories')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
