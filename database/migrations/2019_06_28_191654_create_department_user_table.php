<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id')->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('user_id')->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('order');
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
        Schema::dropIfExists('department_users');
    }
}
