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
        Schema::create('service_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('cpu');
            $table->tinyInteger('ram');
            $table->tinyInteger('hdd')->nullable();
            $table->tinyInteger('ssd')->nullable();
            $table->string('os');
            $table->string('vga');
            $table->string('display');
            $table->string('batery');
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_offers');
    }
};
