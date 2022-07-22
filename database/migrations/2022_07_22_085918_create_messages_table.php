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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id', 20)->unsigned()->nullable();
            $table->string('room', 255)->nullable();
            $table->bigInteger('sender_id', 20)->unsigned();
            $table->string('sender_type', 255)->default();
            $table->bigInteger('receiver_id', 20)->unsigned();
            $table->string('receiver_type', 255);
            $table->text('content', 255);
            $table->string('content_type', 255)->default('text');
            $table->integer('association_id', 10)->unsigned()->nullable();
            $table->string('association_type', 255)->default('text');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sender_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
