<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->string('roll_no');
        $table->string('candidate_name')->nullable();
        $table->string('email')->nullable();
        $table->string('mother_name')->nullable();
        $table->string('oet_round')->nullable();
        $table->string('oet_rank')->nullable();
        $table->string('category')->nullable();
        $table->string('admission_category')->nullable();

        $table->string('amount')->default('20000');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
