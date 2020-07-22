<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookPostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_post_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('facebook_post_id')->unique()->foreign('facebook_post_id')->references('id')->on('facebook_posts')->onDelete('cascade');
            $table->char('image_path', 255);
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
        Schema::dropIfExists('facebook_post_images');
    }
}
