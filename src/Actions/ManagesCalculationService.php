<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesCalculationService
{
    /**
     * calculate
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function calculate(Hydrator $hydrator): array
    {
        return $this->post(
            'calculate',
            $hydrator->hydrate(),
        );
    }
}
