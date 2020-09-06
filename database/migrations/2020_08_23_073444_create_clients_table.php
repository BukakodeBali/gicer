<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10);
            $table->string('name', 255)->nullable();
            $table->string('ecode', 50)->nullable();
            $table->string('nace_code', 50)->nullable();
            $table->string('pic')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('password', 255);
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
        Schema::dropIfExists('clients');
    }
}
