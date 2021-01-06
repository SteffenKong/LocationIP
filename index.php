<?php

use SteffenKong\LocationIP\LocationIP;

require './vendor/autoload.php';

try {
    $json = (LocationIP::instance(''))->setHttpClientOptions([
        'timeout' => 2.0,
    ])->getLocation('');
    var_dump($json);
}catch (\Exception $e)
{
    var_dump($e->getMessage());
}
