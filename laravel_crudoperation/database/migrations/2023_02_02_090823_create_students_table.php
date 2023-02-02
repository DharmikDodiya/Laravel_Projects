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
            $table->string("studentname",30);
            $table->string("email",50)->unique();
            $table->bigInteger("contactno")->unique();
            $table->date("dateofbirth");
            $table->enum("gender",['male','female','other']);
            $table->string("image")->nullable();
            $table->string("password");
            $table->string("confirm_password");
            $table->timestamps();
            $table->softDeletes();
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
