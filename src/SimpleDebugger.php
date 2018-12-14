<?php

namespace Morphable;

use \Morphable\SimpleDebugger\DebugItem;
use \Morphable\SimpleDebugger\Log;
use \Morphable\SimpleDebugger\Metadata;

class SimpleDebugger
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @var bool
     */
    private $disabled = false;

    /**
     * @var array
     */
    private $items;

    private $timer;

    /**
     * @param array items
     * @return self
     */
    public function __construct($items = [])
    {
        $this->items = $items;
        $this->disabled = false;
        $this->metadata = new Metadata();
        self::$instance = $this;
    }

    /**
     * Disable the instance (nothing will be added, updated or deleted)
     *
     * @return self
     */
    public function disable()
    {
        $this->disalbed = true;

        return $this;
    }

    /**
     * Get current instance
     *
     * @return \Morphable\SimpleDebugger
     */
    public function getInstance()
    {
        return self::$instance;
    }

    /**
     * @param string key
     * @return \Morphable\SimpleDebugger\DebugItem item
     */
    public function get(string $key)
    {
        return $this->items[$key];
    }

    /**
     * @param string key
     * @param mixed data
     * @return self
     */
    public function add(string $key, $data)
    {
        if ($this->disabled) {
            return $this;
        }

        $breakpoint = $this->metadata->add($key)->get($key);

        $item = new DebugItem($key, $data, $breakpoint);
        $this->items[$key] = $item;

        return $this;
    }

    /**
     * @param string key
     * @return self
     */
    public function delete($key)
    {
        if ($this->disabled) {
            return $this;
        }

        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }

        return $this;
    }

    /**
     * @param string key
     * @param mixed data
     * @return self
     */
    public function update($key, $data)
    {
        if ($this->disabled) {
            return $this;
        }

        if (isset($this->items[$key])) {
            $this->items[$key]->updateData($data);
        }

        return $this;
    }

    /**
     * @return \Morphable\SimpleDebugger\Log
     */
    public function getLog()
    {
        return new Log($this->items);
    }
}
