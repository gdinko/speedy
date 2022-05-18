<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPickupService
{
    /**
     * pickup
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
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
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
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
