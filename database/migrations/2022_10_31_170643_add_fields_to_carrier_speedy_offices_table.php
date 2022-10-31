<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCarrierSpeedyOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrier_speedy_offices', function (Blueprint $table) {

            $table
                ->char('city_uuid', 36)
                ->nullable()
                ->after('site_id')
                ->index();

            $table
                ->tinyInteger('is_robot')
                ->nullable()
                ->default(0)
                ->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrier_speedy_offices', function (Blueprint $table) {
            $table->dropColumn('city_uuid');
            $table->dropColumn('is_robot');
        });
    }
}
