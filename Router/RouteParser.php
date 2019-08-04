<?php
namespace Eleven\Router;


use Eleven\Router\Dispatcher;
use Eleven\Router\Exceptions\NotFoundException;

class RouteParser implements Dispatcher
{
  /*
  *@var genereteRoute
  * generate RouteCollection
  */
  protected $generateRoute;
  
  public function __construct()
  {
    
  }
  /*
  *@return dispatcher dispatch
  */
  public function generate($dispatcher)
  {
    
    // Fetch method and URI from somewhere
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];
    
    // Strip query string (?foo=bar) and decode URI
    if (false !== $pos = strpos($uri, '?')) {
      $uri = substr($uri, 0, $pos);
    }
      $uri = rawurldecode($uri);
    
      $this->generateRoute = $dispatcher->dispatch($httpMethod, $uri);
  }
  
  /*
  *@return get generate 
  *parse NOT_FOUND | METHOD_NOT_ALLOWED | FOUND
  */
  public function getGenerate()
  {
    //route not found
    if($this->generateRoute[0] === self::NOT_FOUND){
    
      throw new NotFoundException('Page Not Found!!');
    }
    //method not allowed
    if($this->generateRoute[0] === self::METHOD_NOT_ALLOWED){
      throw new MethodNotAllowedException('Method Not Allowed!!');
    }
    //foun route
    if($this->generateRoute[0] === self::FOUND){
     return $this->generateRoute; 
    }
    
  }
  

}