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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 32);
            $table->string('username', 50);
            $table->string('password', 200);
            $table->string('address')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->tinyInteger('type');
            $table->integer('parent_id')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->boolean('closed')->default(0);
            $table->string('code')->unique()->nullable();
            $table->tinyInteger('social_type')->default(0);
            $table->tinyInteger('social_id')->unique()->nullable();
            $table->string('social_name')->default('');
            $table->string('social_nickname')->default('');
            $table->string('social_avatar')->default('');
            $table->text('description')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
