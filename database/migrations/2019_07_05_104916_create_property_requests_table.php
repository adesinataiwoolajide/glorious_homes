<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_requests', function (Blueprint $table) {
            $table->bigIncrements('request_id');

            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('city');
            $table->string('state');
            $table->unsignedBigInteger('property_category_id');
            $table->string('budget_from');
            $table->string('budget_to');
            $table->unsignedBigInteger('property_type_id');
            $table->text('facilities');
            $table->text('other_description');
           
            $table->foreign('property_category_id')->references('property_category_id')->on('property_categories');
            $table->foreign('property_type_id')->references('property_type_id')->on('property_types');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('property_requests');
    }
}
