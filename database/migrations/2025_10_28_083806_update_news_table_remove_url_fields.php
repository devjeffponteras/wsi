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
        Schema::table('news', function (Blueprint $table) {
            // Rename image_url to banner_image for clarity
            $table->renameColumn('image_url', 'banner_image');

            // Rename thumbnail_url to thumbnail_image for clarity
            $table->renameColumn('thumbnail_url', 'thumbnail_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Revert the column renames
            $table->renameColumn('banner_image', 'image_url');
            $table->renameColumn('thumbnail_image', 'thumbnail_url');
        });
    }
};
