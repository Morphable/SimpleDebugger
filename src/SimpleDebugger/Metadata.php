<?php

namespace Morphable\SimpleDebugger;

class Metadata
{
    private $time;

    private $timestamp;

    private $breakpoint;

    private $memory;

    /**
     * @return self
     */
    public function __construct($time)
    {
        $this->time = $time;
        $this->timestamp = date('Y-m-d H:i:s');
        $this->breakpoint = microtime(true) - $this->time;
        $this->memory = memory_get_usage(false);
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getBreakpoint()
    {
        return $this->breakpoint;
    }

    public function getMemory()
    {
        return $this->memory;
    }
}
