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
        Schema::create('stagings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('number');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('end_po');
            $table->date('qc_date');
            $table->char('monitor')->nullable();
            $table->string('license');
            $table->string('po_number');
            $table->char('customer')->nullable();
            $table->char('contact')->nullable();
            $table->char('project')->nullable();
            $table->unsignedBigInteger('category');
            $table->text('note');
            $table->timestamps();

            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('contact')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('project')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('req_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagings');
    }
};
