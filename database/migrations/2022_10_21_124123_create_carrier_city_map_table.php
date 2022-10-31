<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('carrier_city_map')) {
            Schema::create('carrier_city_map', function (Blueprint $table) {
                $table->id();

                $table->string('carrier_signature')->index();
                $table->unsignedBigInteger('carrier_city_id')->index();
                $table->string('country_code', 3);
                $table->string('region')->nullable();
                $table->string('name');
                $table->string('name_slug');
                $table->string('post_code');
                $table->string('slug')->index();
                $table->char('uuid', 36)->index();

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrier_city_map');
    }
};
