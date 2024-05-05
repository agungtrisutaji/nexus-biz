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
            $table->string('class');
            $table->string('brand');
            $table->string('model');
            $table->string('cpu');
            $table->integer('ram');
            $table->integer('hdd')->nullable();
            $table->integer('ssd')->nullable();
            $table->string('os');
            $table->string('vga');
            $table->string('display');
            $table->string('battery')->nullable();
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
