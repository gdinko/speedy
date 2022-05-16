<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesShipmentService
{
    /**
     * createShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function createShipment(Request $request): array
    {
        return $this->post(
            'shipment',
            $request->hydrate(),
        );
    }

    /**
     * cancelShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function cancelShipment(Request $request): array
    {
        return $this->post(
            'shipment/cancel',
            $request->hydrate(),
        );
    }

    /**
     * addParcel
     *
     * @param  mixed $request
     * @return array
     */
    public function addParcel(Request $request): array
    {
        return $this->post(
            'shipment/add_parcel',
            $request->hydrate(),
        );
    }

    /**
     * finalizePendingShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function finalizePendingShipment(Request $request): array
    {
        return $this->post(
            'shipment/finalize',
            $request->hydrate(),
        );
    }

    /**
     * shipmentInformation
     *
     * @param  mixed $request
     * @return array
     */
    public function shipmentInformation(Request $request): array
    {
        return $this->post(
            'shipment/info',
            $request->hydrate(),
        );
    }

    /**
     * secondaryShipments
     *
     * @param  mixed $shipmentId
     * @param  mixed $request
     * @return array
     */
    public function secondaryShipments($shipmentId, Request $request): array
    {
        return $this->post(
            "shipment/{$shipmentId}/secondary",
            $request->hydrate(),
        );
    }

    /**
     * updateShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function updateShipment(Request $request): array
    {
        return $this->post(
            'shipment/update',
            $request->hydrate(),
        );
    }

    /**
     * updateShipmentProperties
     *
     * @param  mixed $request
     * @return array
     */
    public function updateShipmentProperties(Request $request): array
    {
        return $this->post(
            'shipment/update/properties',
            $request->hydrate(),
        );
    }

    /**
     * findParcelsByReference
     *
     * @param  mixed $request
     * @return array
     */
    public function findParcelsByReference(Request $request): array
    {
        return $this->post(
            'shipment/search',
            $request->hydrate(),
        );
    }

    /**
     * handoverToCourier
     *
     * @param  mixed $request
     * @return array
     */
    public function handoverToCourier(Request $request): array
    {
        return $this->post(
            'shipment/handover',
            $request->hydrate(),
        );
    }
}
