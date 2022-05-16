<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesPickupService
{
    /**
     * pickup
     *
     * @param  mixed $request
     * @return array
     */
    public function pickup(Request $request): array
    {
        return $this->post(
            'pickup',
            $request->hydrate(),
        );
    }

    /**
     * pickupTerms
     *
     * @param  mixed $request
     * @return array
     */
    public function pickupTerms(Request $request): array
    {
        return $this->post(
            'pickup/terms',
            $request->hydrate(),
        );
    }
}
