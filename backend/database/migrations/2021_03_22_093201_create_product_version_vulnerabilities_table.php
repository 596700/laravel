<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVersionVulnerabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_version_vulnerabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(('product_version_id'))->nullable();
            $table->foreign('product_version_id')->references('id')->on('product_versions')->onDelete('set null');
            $table->unsignedBigInteger('vulnerability_id')->nullable();
            $table->foreign('vulnerability_id')->references('id')->on('vulnerabilities')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('product_version_vulnerabilities');
    }
}
