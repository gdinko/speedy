<?php

namespace Gdinko\Speedy\Traits;

use Gdinko\Speedy\Exceptions\SpeedyImportValidationException;
use Illuminate\Support\Facades\Validator;

trait ValidatesImport
{
    /**
     * validated
     *
     * @param  array $data
     * @return array
     */
    protected function validated(array $data): array
    {
        $validator = Validator::make(
            $data,
            $this->validationRules()
        );

        if ($validator->fails()) {
            throw new SpeedyImportValidationException(
                __CLASS__,
                422,
                $validator->messages()->toArray(),
                $data
            );
        }

        return $validator->validated();
    }
}
