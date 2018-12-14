<?php

namespace Morphable\SimpleDebugger;

class DebugItem
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $data;

    /**
     * @var string
     */
    private $timestamp;

    /**
     * @param string key
     * @param mixed data
     * @return self
     */
    public function __construct(string $key, $data)
    {
        $this->key = $key;
        $this->data = $data;
        $this->timestamp = strtotime('now');
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function updateData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
