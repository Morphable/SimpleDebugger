<?php

namespace Morphable\SimpleDebugger;

class Metadata
{
    /**
     * @var array
     */
    private $breakpoints = [];

    /**
     * @return self
     */
    public function __construct()
    {
        $this->add("start_timer");
    }

    /**
     * @param string name
     * @return self
     */
    public function add(string $name)
    {
        $microtime = microtime(true);
        $memoryUsage = memory_get_usage(false);
        $timestampt = date('Y-m-d H:i:s');

        $this->breakpoints[$name] = [
            'microtime' => $microtime,
            'microtimeDifference' => ($name === 'start_timer'
                ? $microtime
                : $microtime - $this->breakpoints['start_timer']['microtimeDifference']),
            'memoryUsage' => ($name === 'start_timer'
                ? $memoryUsage
                : $memoryUsage - $this->breakpoints['start_timer']['memoryUsage']),
            'timestamp' => strtotime('now')
        ];

        return $this;
    }

    public function get(string $name)
    {
        return $this->breakpoints[$name];
    }

    /**
     * @return array
     */
    public function getBreakpoints()
    {
        $this->add("end_timer");
        return $this->breakpoints;
    }
}
