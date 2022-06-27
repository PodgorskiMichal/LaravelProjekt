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
        Schema::create('product_powereds', function (Blueprint $table) {
            $table->id();
            $table->String('name', 255);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('powered_id');
            $table->foreign('powered_id')->references('id')->on('product_powereds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_powered_id_foreign');
            $table->dropColumn('powered_id');
        });

        Schema::dropIfExists('product_powereds');
    }
};
