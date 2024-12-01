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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text')->nullable();
            // $table->integer('teacher_id');
            // $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->string('category'); //
            $table->string('level');
            $table->integer('cost');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
