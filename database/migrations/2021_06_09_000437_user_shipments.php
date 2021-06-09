<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserShipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment("Id del Usuario");
            $table->string('tracking_number')->comment('Número de rastreo');
            $table->string('total_price')->nullable()->comment('Precio total');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id'], 'FK_user_shipments_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
