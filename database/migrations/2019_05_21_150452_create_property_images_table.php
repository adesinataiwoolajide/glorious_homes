<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_images', function (Blueprint $table) {
            $table->bigIncrements('image_id');
            $table->string('property_number')->unique();
            $table->string('cover_picture');
            $table->string('otherpicture1');
            $table->string('otherpicture2');
            $table->string('otherpicture3');
            $table->string('otherpicture4');
            $table->string('otherpicture5');
            $table->string('otherpicture6');
            $table->string('otherpicture7');
            $table->string('otherpicture8');
            $table->string('otherpicture9');
            $table->string('otherpicture10');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_images');
    }
}
