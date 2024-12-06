<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('order_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('type_id')->nullable();
            $table->string('type_name');
            $table->unsignedTinyInteger('type_size_id');
            $table->string('name')->index();
            $table->string('concentration');
            $table->string('category');
            $table->decimal('price', 6, 2);
            $table->unsignedTinyInteger('quantity');
            $table->decimal('subtotal_price', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
