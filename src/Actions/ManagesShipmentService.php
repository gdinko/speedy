<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesShipmentService
{
    /**
     * createShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function createShipment(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment',
            $hydrator->hydrate(),
        );
    }

    /**
     * cancelShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function cancelShipment(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/cancel',
            $hydrator->hydrate(),
        );
    }

    /**
     * addParcel
     *
     * @param  mixed $request
     * @return array
     */
    public function addParcel(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/add_parcel',
            $hydrator->hydrate(),
        );
    }

    /**
     * finalizePendingShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function finalizePendingShipment(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/finalize',
            $hydrator->hydrate(),
        );
    }

    /**
     * shipmentInformation
     *
     * @param  mixed $request
     * @return array
     */
    public function shipmentInformation(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/info',
            $hydrator->hydrate(),
        );
    }

    /**
     * secondaryShipments
     *
     * @param  mixed $shipmentId
     * @param  mixed $request
     * @return array
     */
    public function secondaryShipments($shipmentId, Hydrator $hydrator): array
    {
        return $this->post(
            "shipment/{$shipmentId}/secondary",
            $hydrator->hydrate(),
        );
    }

    /**
     * updateShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function updateShipment(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/update',
            $hydrator->hydrate(),
        );
    }

    /**
     * updateShipmentProperties
     *
     * @param  mixed $request
     * @return array
     */
    public function updateShipmentProperties(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/update/properties',
            $hydrator->hydrate(),
        );
    }

    /**
     * findParcelsByReference
     *
     * @param  mixed $request
     * @return array
     */
    public function findParcelsByReference(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/search',
            $hydrator->hydrate(),
        );
    }

    /**
     * handoverToCourier
     *
     * @param  mixed $request
     * @return array
     */
    public function handoverToCourier(Hydrator $hydrator): array
    {
        return $this->post(
            'shipment/handover',
            $hydrator->hydrate(),
        );
    }
}
