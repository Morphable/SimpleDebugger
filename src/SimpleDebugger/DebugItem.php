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
     * @var array
     */
    private $metadata;

    /**
     * @param string key
     * @param mixed data
     * @param array metadata
     * @return self
     */
    public function __construct(string $key, $data, $metadata = null)
    {
        $this->key = $key;
        $this->data = $data;
        $this->metadata = $metadata;
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

    /**
     * @var mixed data
     * @return self
     */
    public function updateData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
