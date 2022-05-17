<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierSpeedyOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_speedy_offices', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('speedy_office_id')->index();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->bigInteger('site_id')->index();
            $table->string('type');
            $table->bigInteger('nearby_office_id')->nullable()->default(0);
            $table->tinyInteger('pick_up_allowed')->nullable()->default(0);
            $table->tinyInteger('drop_off_allowed')->nullable()->default(0);
            $table->tinyInteger('card_payment_allowed')->nullable()->default(0);
            $table->tinyInteger('pallet_office')->nullable()->default(0);
            $table->tinyInteger('cash_payment_allowed')->nullable()->default(0);
            $table->json('address')->nullable();
            $table->json('max_parcel_dimensions')->nullable();
            $table->json('working_time_schedule')->nullable();
            $table->json('cargo_types_allowed')->nullable();
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
        Schema::dropIfExists('carrier_speedy_offices');
    }
}
