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
        Schema::table('count_of_account_openings', function (Blueprint $table) {
            $table->foreignId('financial_year_id')->nullablew()->constrained();
        });

        Schema::table('revenue_collections', function (Blueprint $table) {
            $table->foreignId('financial_year_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('count_of_account_openings', function (Blueprint $table) {
            $table->dropForeign(['financial_year_id']);
            $table->dropColumn('financial_year_id');
        });

        Schema::table('revenue_collections', function (Blueprint $table) {
            $table->dropForeign(['financial_year_id']);
            $table->dropColumn('financial_year_id');
        });
    }
};
