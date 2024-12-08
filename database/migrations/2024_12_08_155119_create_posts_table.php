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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('title')->unique();
            $table->string('intro')->nullable()->comment('wstęp');
            $table->text('content')->nullable();
            $table->string('img')->nullable();
            $table->string('site_description')->nullable()->comment('sekcja head');
            $table->string('site_keyword')->nullable()->comment('sekcja head');
            $table->boolean('approved')->default(1)->index();
            $table->boolean('published')->default(1)->index();
            $table->boolean('comments_allowed')->default(1)->comment('komentarze dozwolone?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
