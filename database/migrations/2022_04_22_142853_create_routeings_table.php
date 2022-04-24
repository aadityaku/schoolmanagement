<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeings', function (Blueprint $table) {
            $table->id();
            $table->string("period");
            $table->string("time");
            $table->foreignId("subject_id")->constrained();
            $table->foreignId("clases_id")->constrained();
            $table->enum("teacherrol",['classteacher','subjectteaher'])->default("classteacher");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routeings');
    }
};
