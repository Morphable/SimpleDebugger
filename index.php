<?php

require __DIR__ . '/vendor/autoload.php';

use \Morphable\SimpleDebugger;

$debugger = new SimpleDebugger();
$debugger
    ->disable()
    ->add("check connection", false)
    ->add("initiate something", true)
    ->add("do something else", true);

$log = $debugger->getLog();
$json = $log->asJson();
$array = $log->asArray();

print_r($array);


