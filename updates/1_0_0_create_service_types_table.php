<?php namespace Mater\Reservations\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateServiceTypesTable Migration
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
        Schema::create('mater_reservations_service_types', function(Blueprint $table) {
            $table->id();
            $table->text('service_name')->nullable();
            $table->text('service_length')->nullable();
            $table->text('service_price')->nullable();
            $table->text('additional_informations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('mater_reservations_service_types');
    }
};
