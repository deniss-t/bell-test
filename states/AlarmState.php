<?php
namespace App\states;
require __DIR__ . '/../vendor/autoload.php';

class AlarmState implements State
{
  public $clock;
  public $mode;
  public function __construct($clock)
  {
    $this->clock = $clock;
    $this->mode = 'alarm';
  }

  public function incrementH(){}
  public function incrementM(){}
  public function tick(){
    echo 'Alarm';
  }
  public function clickH()
  {
    $this->clock->time['alarm']['hours'] == 23 ? $this->clock->time['alarm']['hours'] = 0 : $this->clock->time['alarm']['hours'] += 1;
  }
  public function clickM()
  {
    $this->clock->time['alarm']['minutes'] == 59 ? $this->clock->time['alarm']['minutes'] = 0 : $this->clock->time['alarm']['minutes'] += 1;
  }
  public function nextState()
  {
    $this->clock->setState(ClockState::class);
  }
}
