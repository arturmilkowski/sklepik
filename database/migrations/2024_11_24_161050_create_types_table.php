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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('size_id')->constrained()->onDelete('cascade');
            $table->string('slug')->index();
            $table->string('name')->index();
            $table->decimal('price', 6, 2)->default(0);
            $table->decimal('promo_price', 6, 2)->nullable()->default(0);
            $table->unsignedTinyInteger('quantity')->default(0);
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->boolean('hide')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
