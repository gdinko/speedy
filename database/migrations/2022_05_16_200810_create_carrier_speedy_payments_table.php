<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierSpeedyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_speedy_payments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('doc_id')->index();
            $table->string('shipment_id')->index();
            $table->bigInteger('order')->unique()->index();
            $table->date('date');
            $table->string('doc_type');
            $table->string('payment_type');
            $table->string('payee');
            $table->char('currency', 3);
            $table->decimal('amount');
            $table->date('pickup_date');
            $table->date('primary_shipment_pickup_date');
            $table->date('delivery_date');
            $table->string('sender');
            $table->string('recipient');
            $table->string('note')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();

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
        Schema::dropIfExists('carrier_speedy_payments');
    }
}
