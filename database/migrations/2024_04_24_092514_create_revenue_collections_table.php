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
        Schema::create('revenue_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('posb_net')->default(0);
            $table->integer('certificates_net')->default(0);
            $table->integer('mssc_net')->default(0);
            $table->foreignId('financial_year_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenue_collections');
    }
};
