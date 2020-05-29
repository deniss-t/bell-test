<?php
namespace App\states;
require __DIR__ . '/../vendor/autoload.php';


class ClockState implements State
{
  public $clock;
  public $mode;
  public function __construct($clock)
  {
    $this->clock = $clock;
    $this->mode = 'clock';
  }

  public function incrementH(){}
  public function incrementM(){}
  public function tick(){
    echo 'Clock';
  }
  public function clickH()
  {
    $this->clock->time['clock']['hours'] == 23 ? $this->clock->time['clock']['hours'] = 0 : $this->clock->time['clock']['hours'] += 1;
  }
  public function clickM()
  {
    $this->clock->time['clock']['minutes'] == 59 ? $this->clock->time['clock']['minutes'] = 0 : $this->clock->time['clock']['minutes'] += 1;

  }
  public function nextState()
  {
    $this->clock->setState(AlarmState::class);
  }
}
