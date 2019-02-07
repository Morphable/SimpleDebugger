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

    /**
     * @var int
     */
    private $timer;

    /**
     * @param array items
     * @return self
     */
    public function __construct($items = [])
    {
        $this->items = $items;
        $this->disabled = false;
        $this->startTimer();
        self::$instance = $this;
    }

    /**
     * Disable the instance (nothing will be added, updated or deleted)
     *
     * @return self
     */
    public function disable()
    {
        $this->disabled = true;

        return $this;
    }

    /**
     * Get current instance
     *
     * @return \Morphable\SimpleDebugger
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * Start or restart the timer
     *
     * @return self
     */
    public function startTimer()
    {
        $this->timer = microtime(true);
        return $this;
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

        if ($this->timer == null) {
            $this->startTimer();
        }

        $this->items[$key] = new DebugItem($key, $data, new Metadata($this->timer));

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
