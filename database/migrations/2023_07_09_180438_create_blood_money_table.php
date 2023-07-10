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
        Schema::create('blood_money', function (Blueprint $table) {
            $table->id();
            $table->string('name_box');
            $table->integer("count_user")->nullable();
            $table->float("all_value",8,2)->nullable();
            $table->float("value_in",8,2)->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_money');
    }
};
