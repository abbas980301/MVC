<?php

function loadFile($fileName) {
    try {
        $file = '../' .$fileName . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else
            throw new exception("Can not load $fileName");
    } catch (Exception $e) {
        echo "<h2>Can not load {{ $fileName }} Class</h2>";
        echo "<pre>";
    }
}
spl_autoload_register('loadFile');

$functionFiles = scandir ('../inc');
//** Remove . & .. from array */
array_shift($functionFiles);
array_shift($functionFiles);

foreach ($functionFiles as $file) {
    $file = '../inc/'.$file;
    if (file_exists($file)) {
        require_once $file;
    }
}
