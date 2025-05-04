<?php

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('status', array_column(PostStatus::cases(), 'value'))->default(PostStatus::DRAFT->value);
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('excerpt');
            $table->string('banner')->nullable();
            $table->string('banner_video_url')->nullable();
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('posts');
    }
};
