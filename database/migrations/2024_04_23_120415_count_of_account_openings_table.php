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
        Schema::create('count_of_account_openings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('office_id')->constrained();
            $table->integer('sb')->default(0);
            $table->integer('rd')->default(0);
            $table->integer('mis')->default(0);
            $table->integer('ppf')->default(0);
            $table->integer('scss')->default(0);
            $table->integer('ssa')->default(0);
            $table->integer('td')->default(0);
            $table->integer('mssc')->default(0);
            $table->integer('nsc')->default(0);
            $table->integer('kvp')->default(0);
            // Date
            $table->timestamps();
            // Month
            $table->timestamp('month')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('count_of_account_openings');
    }
};
