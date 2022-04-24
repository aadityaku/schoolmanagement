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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("studentname");
            $table->string("dob");
            $table->string("age");
            $table->foreignId("clases_id")->constrained();
            $table->string("education");
            $table->string("fathername");
            $table->string("gender");
            $table->text("address");
            $table->string("roll")->nullable();
            $table->string("addmissionfee")->nullable();
            $table->string("distance");
            $table->string("others")->nullable();
            $table->enum("status",['0','1','2'])->default('0');
            $table->string("password");
            $table->string("contact");
            $table->string("email");
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
        Schema::dropIfExists('students');
    }
};
