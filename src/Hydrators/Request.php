<?php

namespace Gdinko\Speedy\Hydrators;

use Gdinko\Speedy\Facades\Speedy;
use Gdinko\Speedy\Interfaces\Hydrator;

class Request implements Hydrator
{
    protected $data = [];

    /**
     * __construct
     *
     * @param  array $data
     * @return void
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * hydrate
     *
     * @return array
     */
    public function hydrate(): array
    {
        return array_merge(
            $this->data,
            [
                'userName' => Speedy::getUserName(),
                'password' => Speedy::getPassword(),
            ]
        );
    }
}
