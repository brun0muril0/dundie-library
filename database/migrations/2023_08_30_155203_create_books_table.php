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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('title', 200);
            $table->integer('id_author');
            $table->string('gender', 200);
            $table->string('synopsis', 4000);
            $table->string('cover', 300);
            $table->integer('publication_year');
            $table->timestamps();

            $table->foreign('id_author')->references('id_author')->on('authors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
