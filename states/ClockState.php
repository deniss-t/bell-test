<?php
namespace App\states;
require __DIR__ . '/../vendor/autoload.php';

class ClockState implements State
{
  public $clock;
  public function __construct($clock)
  {
    $this->clock = $clock;
  }

  public function incrementH(){}
  public function incrementM(){}
  public function tick(){
    echo 'Clock';
  }
  public function clickH()
  {
    $this->clock->time['clock']['hours'] += 1;
    print_r($this->clock->time);
  }
  public function nextState()
  {
    $this->clock->setState(AlarmState::class);
  }  
}