<?php

namespace Gdinko\Speedy\Actions;

use Gdinko\Speedy\Hydrators\Request;

trait ManagesPrintService
{
    /**
     * print
     *
     * @param  mixed $request
     * @return array
     */
    public function print(Request $request): array
    {
        return $this->post(
            'print',
            $request->hydrate(),
        );
    }

    /**
     * extendedPrint
     *
     * @param  mixed $request
     * @return array
     */
    public function extendedPrint(Request $request): array
    {
        return $this->post(
            'print/extended',
            $request->hydrate(),
        );
    }

    /**
     * labelInfo
     *
     * @param  mixed $request
     * @return array
     */
    public function labelInfo(Request $request): array
    {
        return $this->post(
            'print/labelInfo',
            $request->hydrate(),
        );
    }

    /**
     * printVoucher
     *
     * @param  mixed $request
     * @return array
     */
    public function printVoucher(Request $request): array
    {
        return $this->post(
            'print/voucher',
            $request->hydrate(),
        );
    }
}
