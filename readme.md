# Microp

A Super lightweight php micro-framework.

## Features include:

- Simple REGEXP router for GET & POST requests (more advanced RESTful routing coming soon).
- Simple ajax session management for SPA applications.
- Autoloading, so you never need require a php file again.

This micro-framework has been designed purely to do the very basic boilerplate, for projects where it is not necessary to have a fully fledged heavier weight framework.

## Usage
`
Router::get('/^\/hi\/([\w\d]+)\/?/', function ($uri, $body) {
  if (count($uri) == 2) {
    echo 'Hey there '.$uri[1].'<br/><pre/>';
  }
  var_dump($_GET);
});
`

when navigating to `/hi/Sam?test=attribute` this resolve to the following:

`
Hey there Sam
array(1) {
  ["test"]=>
  string(9) "attribute"
}
`


