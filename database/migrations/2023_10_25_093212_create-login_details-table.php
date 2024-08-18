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
        if (!Schema::hasTable('login_details')) {
            Schema::create('login_details', function (Blueprint $table) {
                $table->integer('login_details_id')->unsigned()->primary();
                $table->integer('user_id')->unsigned();
                $table->timestamp('last_activity')->useCurrent();
                $table->enum('is_type', ['yes', 'no']);

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_details');
    }
};
