<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPaymentsService
{
    /**
     * payments
     *
     * @param  mixed $request
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
