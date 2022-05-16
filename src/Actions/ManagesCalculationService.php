<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesCalculationService
{
    /**
     * calculate
     *
     * @param  mixed $request
     * @return array
     */
    public function calculate(Request $request): array
    {
        return $this->post(
            'calculate',
            $request->hydrate(),
        );
    }
}
