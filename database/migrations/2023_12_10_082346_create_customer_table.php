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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id')->autoIncrement();
            $table->string('name',60);
            $table->string('email',60);
            $table->string('password');
            $table->enum('gender',['M','F','O']);
            $table->text('address');
            $table->date('dob')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('points')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
