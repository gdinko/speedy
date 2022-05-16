<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPickupService
{
    /**
     * pickup
     *
     * @param  mixed $request
     * @return array
     */
    public function pickup(Hydrator $hydrator): array
    {
        return $this->post(
            'pickup',
            $hydrator->hydrate(),
        );
    }

    /**
     * pickupTerms
     *
     * @param  mixed $request
     * @return array
     */
    public function pickupTerms(Hydrator $hydrator): array
    {
        return $this->post(
            'pickup/terms',
            $hydrator->hydrate(),
        );
    }
}
