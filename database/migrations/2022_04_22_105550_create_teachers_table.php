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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("teachername");
            $table->foreignId("user_id")->constrained()->default(null);
            $table->foreignId("subject_id")->constrained();
            $table->string("resume");
            $table->string("contact");
            $table->string("fblink")->default(null);
            $table->string("linkedin")->default(null);
            $table->string("insta")->default(null);
            $table->string("image")->default(null);
            $table->string("address");
            $table->string("education");
            $table->string("dob");
            $table->string("monthlyfee")->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
