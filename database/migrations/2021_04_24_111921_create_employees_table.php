<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('f_name',50);
            $table->string('l_name',50);
            $table->date('dob');
            $table->string('mobile_no',15);
            $table->string('email',50);
            $table->string('password');
            $table->string('gender');
            $table->string('salary');
            $table->date('joining_date');
            $table->string('image');
            $table->string('passport_doc');
            $table->string('passport_num');
            $table->unsignedBigInteger('department');
            $table->unsignedBigInteger('designation');
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
        Schema::dropIfExists('employees');
    }
}
