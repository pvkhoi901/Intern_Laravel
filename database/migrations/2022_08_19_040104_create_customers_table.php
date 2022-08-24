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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email');
            $table->string('contact')->nullable();
            $table->string('position')->nullable();
            $table->string('unit')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('bank_account')->unique();
            $table->string('invoice_address')->nullable();
            $table->string('type');
            $table->text('term_debt')->nullable();
            $table->string('allowable_debt_limit')->nullable();
            $table->text('description_allowable_debt')->nullable();
            $table->text('customer_notes')->nullable();
            $table->string('user_created')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
