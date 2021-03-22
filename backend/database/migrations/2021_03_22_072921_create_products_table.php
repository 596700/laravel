<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('vendor_url');
            $table->set('part', ['Hardware', 'Operating System', 'Application']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
        // nameカラムのユニーク制約(binary属性付与での大文字小文字の区別)
        // BINARY属性を付けるとカラムが自動的にnullableになってしまうので、合わせてNOT NULLも明示する
        DB::raw('ALTER TABLE products MODIFY name varchar(255) BINARY NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
