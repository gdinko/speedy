<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPrintService
{
    /**
     * print
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return string
     */
    public function print(Hydrator $hydrator): string
    {
        return $this->post(
            'print',
            $hydrator->hydrate(),
            true
        );
    }

    /**
     * extendedPrint
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function extendedPrint(Hydrator $hydrator): array
    {
        return $this->post(
            'print/extended',
            $hydrator->hydrate(),
        );
    }

    /**
     * labelInfo
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return array
     */
    public function labelInfo(Hydrator $hydrator): array
    {
        return $this->post(
            'print/labelInfo',
            $hydrator->hydrate(),
        );
    }

    /**
     * printVoucher
     *
     * @param  \Gdinko\Speedy\Interfaces\Hydrator $hydrator
     * @return string
     */
    public function printVoucher(Hydrator $hydrator): string
    {
        return $this->post(
            'print/voucher',
            $hydrator->hydrate(),
            true
        );
    }
}
