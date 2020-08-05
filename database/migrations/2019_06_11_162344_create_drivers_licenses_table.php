<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unique()->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->char('license_number', 20)->unique();
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
        Schema::dropIfExists('drivers_licenses');
    }
}
