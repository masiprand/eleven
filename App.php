<?php

namespace Eleven;


class App
{
  /*
  *@constans Version the application
  */
  public const VERSION = '0.0.1';
  /*
  *@var options
  */
  protected $options = [
         'RouteCollection' => 'Eleven\\Router\\RouteCollection',
         'RouteParser'     => 'Eleven\\Router\\RouteParser'
     ];
  
  
  /*
  *@beta not definitions
  */
  public function __construct(array $options = [])
  {
      
  }
  
  /*
  *@return callable 
  *@return RouteCollector | RouteParser
  */
  public function elevenRoute(callable $RouteCallableCallback)
  {
    
    return $RouteCallableCallback(new $this->options['RouteCollection'] (new $this->options['RouteParser']));
    
  }
  
  
}