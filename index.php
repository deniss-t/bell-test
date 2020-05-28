<?php
require('vendor/autoload.php');
use App\states\AlarmState;
use App\states\BellState;
use App\states\ClockState;

class Clock
{
  public $time;

  public function __construct()
  {
    $this->time = [
      'clock' => ['hours' => 12, 'minutes' => 0],
      'alarm' => ['hours' => 6, 'minutes' => 0]
    ]; 
  //
    $this->setState(ClockState::class);
  }
  public function setState($className)
  {
    $this->state = new $className($this);
  }
  public function clickMode()
  {
    $this->state->nextState();
  }   
  public function clickH()
  {
   $this->state->clickH();
  }


}

$clock = new Clock();
$clock->clickH();
$clock->clickMode();
$clock->clickH();
$clock->clickMode();
$clock->clickH();
//$clock->getCurrentMode();