<?php
require('vendor/autoload.php');
use App\states\AlarmState;
use App\states\BellState;
use App\states\ClockState;

$clock = new ClockState();
$clock->tick();