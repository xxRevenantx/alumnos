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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('curp')->unique();
            $table->string('matricula')->unique();
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('edad');
            $table->string('fechaNacimiento');
            $table->string('sexo');
            $table->enum('status', ['1', '2'])->default('2');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('generation_id');

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('generation_id')->references('id')->on('generations');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};


