<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Interfaces\Hydrator;

trait ManagesPrintService
{
    /**
     * print
     *
     * @param  mixed $request
     * @return array
     */
    public function print(Hydrator $hydrator): array
    {
        return $this->post(
            'print',
            $hydrator->hydrate(),
        );
    }

    /**
     * extendedPrint
     *
     * @param  mixed $request
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
     * @param  mixed $request
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
     * @param  mixed $request
     * @return array
     */
    public function printVoucher(Hydrator $hydrator): array
    {
        return $this->post(
            'print/voucher',
            $hydrator->hydrate(),
        );
    }
}
