<?php

use App\Enums\CareerStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('resolution');
            $table->string('excerpt');
            $table->string('duration');
            $table->string('modality');
            $table->text('scope');
            $table->json('study_plan')->nullable();
            $table->enum('status', array_column(CareerStatus::cases(), 'value'))->default(CareerStatus::DRAFT->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('careers');
    }
};
