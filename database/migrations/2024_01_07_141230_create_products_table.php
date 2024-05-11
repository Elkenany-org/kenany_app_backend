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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->nullable();
            $table->json('content')->nullable();
            $table->decimal('price')->default(0);
            $table->enum('offer_type',['fixed','percentage'])->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->dateTime('is_offerd')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
