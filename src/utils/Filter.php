<?php

namespace TaskBook\Utils;

class Filter
{
    private $arrayToFilter = [];

    public function __construct(array $arrayToFilter)
    {
        $this->arrayToFilter = $arrayToFilter;
    }

    public function process($allowedKeys)
    {
        return array_filter(
            $this->arrayToFilter,
            function ($key) use ($allowedKeys) {
                return in_array($key, $allowedKeys);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}


