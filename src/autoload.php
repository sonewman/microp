<?php # autoload

$tree = array();

function walk ($path) {
  global $tree;
  $folders = scandir($path);
  $tree[] = $path;

  foreach ($folders as $folder) {
    if ($folder === '.' || $folder === '..' 
      || (strpos($folder, '.') === 0)) continue;

    if (is_dir($path.'/'.$folder)) {
      $f = $path.'/'.$folder.'/';
      $tree[] = $f;
      walk($f);
    }
  }
}

walk(SRC);

function __autoload ($name) {
  global $tree;
  // loop over folders in tree
  foreach ($tree as $folder) {
    $path = $folder.strtolower($name).'.php';
    if (file_exists($path)) {
      require_once $path;
      return;
    }
  }
}