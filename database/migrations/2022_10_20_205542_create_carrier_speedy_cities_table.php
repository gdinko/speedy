<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierSpeedyCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_speedy_cities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('speedy_city_id')->index();
            $table->char('country_code3', 3)->nullable()->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('post_code')->nullable()->index();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('municipality')->nullable();
            $table->string('municipality_en')->nullable();
            $table->string('region_name')->nullable();
            $table->string('region_name_en')->nullable();
            $table->json('meta')->nullable();

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
        Schema::dropIfExists('carrier_speedy_cities');
    }
}
