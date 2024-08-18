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
        if (!Schema::hasTable('chat_message')) {
            Schema::create('chat_message', function (Blueprint $table) {
                $table->id('chat_message_id');
                $table->integer('to_user_id')->unsigned();
                $table->integer('from_user_id')->unsigned();
                $table->string('chat_message');
                $table->timestamp('timestamp')->useCurrent();
                $table->integer('status');
            });
        }
    }
        /**
         * Reverse the migrations.
         */
        public
        function down(): void
        {
            Schema::dropIfExists('chat_message');
        }
    };
