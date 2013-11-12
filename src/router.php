<?php #Router

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

// URI
$uri = $_SERVER['REQUEST_URI'];
define('URI', urldecode($uri));


class Router {

  private static $matched = false;

  public static function get ($uri, $route) {
    if (!self::$matched && strtolower(REQUEST_METHOD) === 'get')
      return self::resolve($uri, $route, $_GET);
  }

  public static function post ($uri, $route) {
    global $request;
    if (!self::$matched && strtolower(REQUEST_METHOD) === 'post')
      return self::resolve($uri, $route, $_POST);
  }

  private static function resolve ($uri, $route, $body = null) {
    $matched = preg_match($uri, URI, $matches);
    if ($matched === 0) return;
    self::$matched = true;
    $route($matches, $body);
  }
}