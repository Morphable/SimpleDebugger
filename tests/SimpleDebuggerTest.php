<?php

use \Morphable\SimpleDebugger;

class SimpleDebuggerTest extends \PHPUnit\Framework\TestCase
{
    public function testSimeplDebugger()
    {
        $debugger = new SimpleDebugger();
        $debugger->add('test1', [1]);
        sleep(0.1);
        $debugger->add('test2', [2]);
        sleep(0.5);
        $debugger->add('test3', [3]);
        sleep(0.5);
        $debugger->add('test4', [4]);
        sleep(2);
        $debugger->add('test5', [5]);
    }
}
