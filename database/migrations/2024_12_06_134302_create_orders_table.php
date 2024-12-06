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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('orderable_id');
            $table->string('orderable_type');
            $table->foreignId('status_id')->default(1)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sale_document_id')->default(1)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('total_price', 6, 2)->default(0);
            $table->decimal('delivery_cost', 6, 2)->default(0);
            $table->decimal('total_price_and_delivery_cost', 6, 2)->default(0);
            $table->string('delivery_name', 60)->nullable()->default(null);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
