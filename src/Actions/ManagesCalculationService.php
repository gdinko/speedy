<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesCalculationService
{
    /**
     * calculate
     *
     * @param  mixed $request
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
