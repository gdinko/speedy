<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierSpeedyCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_speedy_countries', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('speedy_country_id');
            $table->string('name')->index();
            $table->string('name_en')->nullable()->index();
            $table->char('iso_alpha2', 2);
            $table->char('iso_alpha3', 3)->index();
            $table->string('post_code_formats')->nullable();
            $table->tinyInteger('require_state')->nullable()->default(0);
            $table->string('address_type')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('default_office_id')->nullable();
            $table->string('street_types')->nullable();
            $table->string('street_types_en')->nullable();
            $table->string('complex_types')->nullable();
            $table->string('complex_types_en')->nullable();
            $table->string('site_nomen')->nullable();

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
        Schema::dropIfExists('carrier_speedy_countries');
    }
}
