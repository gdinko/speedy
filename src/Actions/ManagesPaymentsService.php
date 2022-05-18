<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPaymentsService
{
    /**
     * payments
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function payments(Hydrator $hydrator): array
    {
        return $this->post(
            'payments',
            $hydrator->hydrate(),
        );
    }
}
