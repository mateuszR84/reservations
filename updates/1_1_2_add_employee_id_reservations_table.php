<?php namespace Mater\Reservations\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateEmployeesTable Migration
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
        Schema::table('mater_reservations_reservations', function(Blueprint $table) {
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id', 'mater_reservations_reservation_employee_id')
                    ->references('id')->on('mater_reservations_employees');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
    }
};
