<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_facilities', function (Blueprint $table) {
            $table->bigIncrements('facility_id');
            $table->string('property_number')->unique();
            $table->string('newly_built');
            $table->string('newly_renovated');
            $table->string('pop');
            $table->string('dilapidated');
            $table->string('fenced');
            $table->string('water');
            $table->string('gate');
            $table->string('security');
            $table->string('garage');
            $table->string('others');
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
        Schema::dropIfExists('property_facilities');
    }
}
