<?php
namespace App\states;
require __DIR__ . '/../vendor/autoload.php';

class BellState implements State
{
  public $mode;
  public function __construct()
  {
    $this->mode = 'bell';
  }
  public function incrementH(){}
  public function incrementM(){}
  public function clickH(){}
  public function clickM(){}
  public function tick(){
    echo 'Bell';
  }
  public function nextState()
  {
    $this->clock->setState(ClockState::class);
  }
}
