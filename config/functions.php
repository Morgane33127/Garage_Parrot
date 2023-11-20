<?php

function error($error)
{
  $message = date("d-m-Y H:i:s") . " : " . $error . "\n";
  file_put_contents('error.txt', $message, FILE_APPEND | LOCK_EX);
}
