# eleven


#Basic
<code>
use Eleven\App;
use Eleven\Router\HandlerCollection;

$app = new App();

$app->elevenRoute(function($route){



  
  $route->get('/',function() use($app){
   return 'Hallo worl!';
  });
  
  
  
  
  
  
  
  
  $newApp = $route->getDataRoutes();
  $handler = new HandlerCollection($newApp,[
    'controller' => 'App\\Controllers\\',
  ]);
  
  
  
  echo $handler->callableCollector();
  echo $handler->controllerCollector();
});

