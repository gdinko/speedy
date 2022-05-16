<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesPaymentsService
{    
    /**
     * payments
     *
     * @param  mixed $request
     * @return array
     */
    public function payments(Request $request): array
    {
        return $this->post(
            'payments',
            $request->hydrate(),
        );
    }
}
