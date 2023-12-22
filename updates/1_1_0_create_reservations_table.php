<?php namespace Mater\Reservations\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateReservationsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('mater_reservations_reservations', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id', 'mater_reservations_reservation_client_id')
                    ->references('id')->on('mater_reservations_clients');
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id', 'mater_reservations_reservation_service_id')
                    ->references('id')->on('mater_reservations_clients');
            $table->dateTime('date');
            $table->text('additional_informations');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('mater_reservations_reservations');
    }
};
