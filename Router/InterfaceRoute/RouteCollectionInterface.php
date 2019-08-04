<?php
namespace Eleven\Router\InterfaceRoute;

interface RouteCollectionInterface
{
  /*
  *@implement add
  */
  public function add($method,string $path,$handler);
  /*
  *@implement get
  */
  public function get(string $path,$handler);
  /*
  *@implement post
  */
  public function post(string $path,$handler);
  /*
  *@implement put
  */
  public function put(string $path,$handler);
  /*
  *@impement patch
  */
  public function patch(string $path,$handler);
  /*
  *@implement delete
  */
  public function delete(string $path,$handler);
  /*
  *@implement options
  */
  public function options(string $path,$handler);
  /*
  *@implement getDataRoutes
  */
  public function getDataRoutes();

}