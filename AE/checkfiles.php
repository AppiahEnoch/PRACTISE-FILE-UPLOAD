<?php


$directory = "./file/";
if(is_dir($directory)) {
  $files = scandir($directory);
  if(count($files) > 2) {
    echo "Directory contains files.";
  } else {
    echo "Directory is empty.";
  }
} else {
  echo "Not a valid directory.";
}
