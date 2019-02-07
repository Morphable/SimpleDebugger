<?php

namespace Morphable\SimpleDebugger;

class Log
{
    /**
     * @var array
     */
    private $items;

    /**
     * @param array items
     * @return self
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}

