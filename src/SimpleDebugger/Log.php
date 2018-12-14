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
     * Format the data to JSON
     *
     * @return string
     */
    public function asJson()
    {
        return json_encode($this->asArray());
    }

    /**
     * Format the data to array
     *
     * @return array
     */
    public function asArray()
    {
        $arr = [];
        foreach ($this->items as $item) {
            $arr[$item->getKey()] = [
                'data' => $item->getData(),
                'metadata' => $item->getMetadata()
            ];
        }
        return $arr;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}

