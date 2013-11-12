<?php session_start();

# Define Root path  
define('ROOT', dirname(__FILE__));

define('SRC', ROOT.'/src/');

require_once SRC.'autoload.php';


Router::post('/^\/session\/clear\/?([\w\d]*)$/', function ($uri, $body) {
  if (count($uri) == 2) {
    $key = $uri[1];
    if(array_key_exists($key, $_SESSION) && !empty($_SESSION[$key]))
      $_SESSION[$key] = null;
  } else {
    $_SESSION = null;
    session_destroy();
  }
});

Router::get('/^\/session\/([\w\d]+)\/?$/', function ($uri, $body) {
  if (count($uri) == 2) {
    $key = $uri[1];
    if(array_key_exists($key, $_SESSION) && !empty($_SESSION[$key]))
      echo json_encode($_SESSION[$key]);
  } else {
    echo json_encode($_SESSION);
  }
});

Router::post('/^\/session\/([\w\d]+)\/?$/', function ($uri, $body) {
  $key;
  if (count($uri) == 2) {
    $key = $uri[1];
    $_SESSION[$key] = $body;
  } else {
    foreach ($body as $key => $value) $_SESSION[$key] = $value;
  }

  echo json_encode($_SESSION);
});



#END