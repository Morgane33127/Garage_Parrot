<?php
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{

  $path = './src/models/'; // Chemin classes
  $extension = '.php';
  $fullPath = $path . $className . $extension;


  if (!file_exists($fullPath)) {
    echo " $fullPath pas trouvé";
    return false;
  }

  include_once $fullPath;
}
