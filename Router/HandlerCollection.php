<?php
namespace Eleven\Router;

use Eleven\Router\InterfaceRoute\HandlerInterface;

class HandlerCollection implements HandlerInterface
{
  /*
  *@var handler
  */
  protected $handler;
  /*
  *@var options
  */
  protected $options;
  
  /*
  *@definition var handler | var options
  *@var handler definisi App::getDataRoutes
  *if isset options = array namespace controllers
  */
  public function __construct($handler,array $options = [])
  {
    $this->handler = $handler;
    
    $this->options = $options;
  }
  /*
  *@retun parse callable
  */
  public function callableCollector()
  {
    
    if(is_callable($this->handler[1])){
      return call_user_func_array($this->handler[1],$this->handler[2]);
    }
  
  }
  /*
  *@return parse contoller and method
  */
  public function controllerCollector()
  {
    if(is_string($this->handler[1])){
      $expl = explode('@',$this->handler[1]);
      $controller = $this->options['controller'].$expl[0];
      $class = new $controller;
      
      return call_user_func_array([$class,$expl[1]],$this->handler[2]);
    }
  }
  
  
}