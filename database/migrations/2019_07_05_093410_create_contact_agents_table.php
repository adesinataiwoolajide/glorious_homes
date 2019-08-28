<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_agents', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('name');
            $table->string('email');
            $table->string('content');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('agent_id')->on('agents');
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
        Schema::dropIfExists('contact_agents');
    }
}
