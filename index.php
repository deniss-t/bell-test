<?php
require('vendor/autoload.php');
use App\states\AlarmState;
use App\states\BellState;
use App\states\ClockState;

class Clock
{
  public $time;
  public $alarmOn;

  public function __construct()
  {
    $this->time = [
      'clock' => ['hours' => 12, 'minutes' => 0],
      'alarm' => ['hours' => 6, 'minutes' => 0]
    ];
    $this->alarmOn = false;
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
  public function longClickMode()
  {
    $this->alarmOn == false ? $this->alarmOn = true : $this->alarmOn = false;
  }
  public function clickH()
  {
   $this->state->clickH();
  }
  public function clickM()
  {
   $this->state->clickM();
  }
  public function tick()
  {
    if($this->getCurrentMode() == 'bell'){
      $this->setState(ClockState::class);
    }
    if($this->time['clock']['hours'] == 23 and $this->time['clock']['minutes'] == 59){
      $this->time['clock']['hours'] = 0;
      $this->time['clock']['minutes'] = 0;
      return;
    }
    if($this->time['clock']['minutes'] == 59){
      $this->time['clock']['minutes'] = 0;
      $this->time['clock']['hours'] += 1;
    } else{
      $this->time['clock']['minutes'] += 1;
    }
    if($this->isAlarmTime() and $this->isAlarmOn()){
      $this->setState(BellState::class);
    }
  }
  public function isAlarmOn()
  {
    return $this->alarmOn;
  }
  public function isAlarmTime()
  {
    return $this->time['clock'] == $this->time['alarm'];
  }
  public function getMinutes()
  {
    return $this->time['clock']['minutes'];
  }
  public function getHours()
  {
    return $this->time['clock']['hours'];
  }
  public function getAlarmMinutes()
  {
    return $this->time['alarm']['minutes'];
  }
  public function getAlarmHours()
  {
    return $this->time['alarm']['hours'];
  }
  public function getCurrentMode()
  {
    return $this->state->mode;
  }

}

$clock = new Clock();
for ($i = 0; $i < 18 * 60; $i++) {
    $clock->tick();
}

ChromePhp::log($clock->isAlarmTime());
ChromePhp::log($clock->time);
//$clock->getCurrentMode();
