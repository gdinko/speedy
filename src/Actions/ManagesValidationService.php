<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesValidationService
{
    /**
     * validateAddress
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function validateAddress(Hydrator $hydrator): array
    {
        return $this->post(
            'validation/address',
            $hydrator->hydrate(),
        );
    }

    /**
     * validatePostcode
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function validatePostcode(Hydrator $hydrator): array
    {
        return $this->post(
            'validation/postcode',
            $hydrator->hydrate(),
        );
    }

    /**
     * validatePhone
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function validatePhone(Hydrator $hydrator): array
    {
        return $this->post(
            'validation/phone',
            $hydrator->hydrate(),
        );
    }

    /**
     * validateShipment
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function validateShipment(Hydrator $hydrator): array
    {
        return $this->post(
            'validation/shipment',
            $hydrator->hydrate(),
        );
    }
}
