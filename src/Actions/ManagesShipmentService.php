<?php

namespace Gdinko\Speedy\Actions;

trait ManagesShipmentService
{
    public function createShipment()
    {
        return $this->post(
            'shipment',
            [],
        );
    }

    public function cancelShipment()
    {
        return $this->post(
            'shipment/cancel',
            [],
        );
    }

    public function addParcel()
    {
        return $this->post(
            'shipment/add_parcel',
            [],
        );
    }

    public function finalizePendingShipment()
    {
        return $this->post(
            'shipment/finalize',
            [],
        );
    }
}
