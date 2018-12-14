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
     * Format the data to XML
     *
     * @return string
     */
    public function asXml()
    {
        $s = "";
        $s .= "<SimpleDebugger>";
        $s .= "<DebugItems>";
        foreach ($this->items as $item) {
            $key = $item->getKey();
            $data = $item->getData();
            $timestamp = $item->getTimestamp();
            $s .= "<DebugItem Key=\"{$key}\" Timestamp=\"{$timestamp}\">".htmlspecialchars(print_r($data, true))."</DebugItem>";
        }
        $s .= "</DebugItems>";
        $s .= "</SimpleDebugger>";

        return $s;
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
                'timestamp' => $item->getTimestamp(),
                'data' => $item->getData()
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

