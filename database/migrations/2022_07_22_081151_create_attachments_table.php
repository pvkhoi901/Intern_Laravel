<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('uuid', 36)->nullable();
            $table->string('attachable_type', 255)->nullable();
            $table->bigInteger('attachable_id')->unsigned();
            $table->string('file_path', 255);
            $table->string('extension', 255);
            $table->string('mime_type', 255);
            $table->integer('size', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};
