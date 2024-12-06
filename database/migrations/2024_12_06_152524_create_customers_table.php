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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voivodeship_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('surname');
            $table->string('street');
            $table->string('zip_code', 6);
            $table->string('city');
            $table->string('email');
            $table->string('phone', 11)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
