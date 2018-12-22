<?php

namespace TaskBook\Models;

abstract class AbstractModel implements ModelInterface
{
    protected $attributes = [];

    public function getAttribute($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : '';
    }

    protected function format($items)
    {
        $formatedItems = [];
        foreach ($items as $item) {
            $formatedItems[] = $this->mapAttributes($item);
        }
        return $formatedItems;
    }

    protected function mapAttributes($item)
    {
        return (array)$item;
    }
}