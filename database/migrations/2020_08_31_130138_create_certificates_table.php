<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('product_id');
            $table->date('issue_date');
            $table->string('status', 50);
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->index('client_id');
            $table->index('product_id');
            $table->index('status_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('certificates_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('certificate_id');
            $table->unsignedBigInteger('status_id');
            $table->date('issue_date')->nullable();
            $table->boolean('is_active')->default(false);
            $table->index('certificate_id');
            $table->index('status_id');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
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
        Schema::dropIfExists('certificates');
    }
}
