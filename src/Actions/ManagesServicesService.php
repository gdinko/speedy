<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesServicesService
{
    /**
     * services
     *
     * @param  mixed $request
     * @return array
     */
    public function services(Request $request): array
    {
        return $this->post(
            'services',
            $request->hydrate(),
        );
    }

    /**
     * destinationServices
     *
     * @param  mixed $request
     * @return array
     */
    public function destinationServices(Request $request): array
    {
        return $this->post(
            'services/destination',
            $request->hydrate(),
        );
    }
}
