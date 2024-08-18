<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('article_cat')) {
            Schema::create('article_cat', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->integer('article_id')->unsigned();
                $table->integer('category_id')->unsigned();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->unique(['article_id', 'category_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
