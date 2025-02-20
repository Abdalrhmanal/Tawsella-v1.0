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
        Schema::create('contact_us_messages', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('admin_id');
            $table->string('sender_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->text('message');
            $table->boolean('is_answered')->default(false);
            $table->boolean('is_registeredInApp')->default(false);
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_messages');
    }
};
