<?php
/* EN : spl_autoload_register — Register given function as __autoload() implementation.
For each class constructs the path, check for its existence and return it if found.

FR : spl_autoload_register - Enregistre une fonction en tant qu'implémentation de __autoload(). 
Pour chaque classe construit le chemin, vérifie son existence et le renvoie si trouvé.
*/

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{

  if (str_contains($className, 'Controller')) {
    $path = './src/controllers/';
  } else {
    $path = './src/models/';
  }

  $extension = '.php';
  $fullPath = $path . $className . $extension;

  if (!file_exists($fullPath)) {
    echo " $fullPath pas trouvé";
    return false;
  } else {
    include_once $fullPath;
  }
}
