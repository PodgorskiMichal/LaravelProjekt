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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('power')->after('description')->nullable();
            $table->decimal('battery_voltage')->after('power')->nullable();
            $table->integer('maximum_rotational_speed')->after('battery_voltage')->nullable();
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
            $table->dropColumn('power');
            $table->dropColumn('battery_voltage');
            $table->dropColumn('maximum_rotational_speed');
        });
    }
};
