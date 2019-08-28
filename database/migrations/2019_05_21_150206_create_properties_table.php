<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('property_id');
            $table->string('property_name');
            $table->integer('property_category_id');
            $table->string('property_number')->unique();
            $table->string('size');
            $table->string('longitude');
            $table->string('latitude');
            $table->integer('document_id');
            $table->integer('agent_id');
            $table->foreign('property_category_id')->references('property_category_id')->on('property_categories');
            $table->foreign('agent_id')->references('agent_id')->on('agents');
            $table->foreign('document_id')->references('document_id')->on('property_documents');
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
        Schema::dropIfExists('properties');
    }
}
