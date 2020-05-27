<?php
namespace App\states;
require __DIR__ . '/../vendor/autoload.php';

class AlarmState implements State
{
  public function incrementH(){}
  public function incrementM(){}
  public function tick(){
    echo 'Alarm';
  }
}