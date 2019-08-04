<?php
namespace Eleven\Router;

use Eleven\Router\RouteParser;
use Eleven\Router\InterfaceRoute\RouteCollectionInterface;

class RouteCollection implements RouteCollectionInterface
{
  /*
  *@var routes 
  */
  protected $routes = [
              'GET'     => [],
              'POST'    => [],
              'PUT'     => [],
              'PATCH'   => [],
              'DELETE'  => [],
              'OPTIONS' => [],
            ];
            
  /*
  *@var dispatcher
  */
  protected $dispatcher;
  /*
  *@var routeParser
  */
  protected $routeParser;
  
  /*
  *@add the routeParser
  */
  public function __construct(RouteParser $routeParser)
  {
    $this->routeParser = $routeParser;
  }
  
  /*
  *@return add Route collections
  *@method name GET|POST|PUT|PATCH|OPTIONS
  *@arg var method string|array
  */
  public function add($method,string $path,$handler)
  {
    $this->routes[$method][$path] = $handler;
  }
  
  /*
  *@return collection add simple GET method
  */
  public function get(string $path,$handler)
  {
    $this->add('GET',$path,$handler);
  }
  
  /*
  *@return collection add simple POST method
  */
  public function post(string $path,$handler)
  {
    $this->add('POST',$path,$handler);
  }
  
  /*
  *@return collection add simple PATCH method
  */
  public function patch(string $path,$handler)
  {
    $this->add('PATCH',$path,$handler);
  }
  
  /*
  *@return collection add simple PUT method
  */
  public function put(string $path,$handler)
  {
    $this->add('PUT',$path,$handler);
  }
  
  /*
  *@return collection add simple DELETE method
  */
  public function delete(string $path,$handler)
  {
    $this->add('DELETE',$path,$handler);
  }
  
  /*
  *@return collection add simple OPTIONS method
  */
  public function options(string $path,$handler)
  {
    $this->add('OPTIONS',$path,$handler);
  }
  
  
  /*
  *@return \FastRoute\simpleDispatcher || FestRoute\RouteCollector
  */
  public function getDataRoutes()
  {
    $routes = $this->routes;
    $this->dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) use($routes) {
        foreach($routes as $method => $arrpath){
           foreach($arrpath as $path => $handler){
             $r->addRoute($method,$path,$handler);
           }
        }
     });
     
     $this->routeParser->generate($this->dispatcher);
     
     try{
     
       return $this->routeParser->getGenerate();
       
     }catch(\Exception $e){
       dd($e->getMessage());
     }
  }
  
}