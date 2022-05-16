<?php

namespace Gdinko\Speedy\Exceptions;

use Exception;

class SpeedyImportValidationException extends Exception
{
    protected $errors = [];

    protected $data = [];

    /**
     * __construct
     *
     * @param  string $message
     * @param  int $code
     * @param  array $errors Validation Errors
     * @return void
     */
    public function __construct($message, $code = 0, $errors = [], $data = [])
    {
        parent::__construct($message, $code);

        $this->errors = $errors;

        $this->data = $data;
    }

    /**
     * getErrors
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
