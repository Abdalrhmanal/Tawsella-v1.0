<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\PaymentTypesEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taxi_movement_types', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('type');
            $table->float('price');
            $table->text('description')->nullable();
            $table->boolean('is_onKM')->default(false);
            $table->integer('payment')->default(PaymentTypesEnum::TL);
            $table->boolean('is_general')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxi_movement_types');
    }
};
