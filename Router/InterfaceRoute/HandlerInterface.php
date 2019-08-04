<?php
namespace Eleven\Router\InterfaceRoute;

Interface HandlerInterface
{
  /*
  *@rerurn void 
  *@implementatio  for function callable
  */
  public function callableCollector();
  /*
  *@return void 
  *@implementation for string controller and method
  */
  public function controllerCollector();
  
}