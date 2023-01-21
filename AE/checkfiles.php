<?php

$directory = "./file/";
if(is_dir($directory)) {
    $files = scandir($directory);
    if(count($files) > 2) {
        echo "List of files in the directory: <br>";
        foreach($files as $file) {
            if($file != "." && $file != "..") {
                echo $file . "<br>";
            }
        }
    } else {
        echo "Directory is empty.";
    }
} else {
    echo "Not a valid directory.";
}

//echo "|||". $_SERVER['DOCUMENT_ROOT'];

