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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained()->default(null);
            $table->foreignId("teacher_id")->constrained()->default(null);
            $table->foreignId("staff_id")->constrained()->default(null);
            $table->foreignId("user_id")->constrained()->default(null);
            $table->date("due_date");
            $table->string("fee");
            $table->enum("status",["paid","due"])->default("due");
            $table->foreignId("clases_id")->constrained()->default(null);

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
        Schema::dropIfExists('payments');
    }
};
