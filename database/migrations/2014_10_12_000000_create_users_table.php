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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("surename",30);
            $table->date("birthday");
            $table->integer("age");
            $table->integer("gander");
            $table->string("city",20);
            $table->string("phone",15)->nullable();
            $table->string("NId",13)->unique();
            $table->string("Qualification",30);
            $table->string('Specialization')->nullable();
            $table->string('FNId');
            $table->string("MNID")->nullable();
            $table->integer("marital_status");
            $table->boolean("life");
            $table->integer("type");
            $table->boolean('admin')->default(false);
            $table->boolean("is_work")->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
