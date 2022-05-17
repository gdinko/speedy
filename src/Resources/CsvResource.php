<?php

namespace Gdinko\Speedy\Resources;

class CsvResource
{
    protected $data = [];

    protected $withHeader = false;

    public function __construct(
        string $string,
        string $separator = ",",
        string $enclosure = "\"",
        string $escape = "\\"
    ) {

        $csvLines = explode(PHP_EOL, $string);

        if (!empty($csvLines)) {
            foreach ($csvLines as $line) {
                $this->data[] = \str_getcsv($line, $separator, $enclosure, $escape);
            }
        }
    }

    /**
     * withHeader
     *
     * @return object
     */
    public function withHeader(): object
    {
        $this->withHeader = true;

        return $this;
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        if ($this->withHeader) {
            return $this->data ?: [];
        }

        return array_slice($this->data ?: [], 1);
    }

    /**
     * toJson
     *
     * @return mixed
     */
    public function toJson(): mixed
    {
        $data = array_slice($this->data ?: [], 1);

        if ($this->withHeader) {
            $data = $this->data ?: [];
        }

        return json_encode($data);
    }
}
