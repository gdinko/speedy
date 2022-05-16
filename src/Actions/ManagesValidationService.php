<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesValidationService
{
    /**
     * validateAddress
     *
     * @param  mixed $request
     * @return array
     */
    public function validateAddress(Request $request): array
    {
        return $this->post(
            'validation/address',
            $request->hydrate(),
        );
    }

    /**
     * validatePostcode
     *
     * @param  mixed $request
     * @return array
     */
    public function validatePostcode(Request $request): array
    {
        return $this->post(
            'validation/postcode',
            $request->hydrate(),
        );
    }

    /**
     * validatePhone
     *
     * @param  mixed $request
     * @return array
     */
    public function validatePhone(Request $request): array
    {
        return $this->post(
            'validation/phone',
            $request->hydrate(),
        );
    }

    /**
     * validateShipment
     *
     * @param  mixed $request
     * @return array
     */
    public function validateShipment(Request $request): array
    {
        return $this->post(
            'validation/shipment',
            $request->hydrate(),
        );
    }
}
