<?php

use SteffenKong\LocationIP\LocationIP;

require './vendor/autoload.php';

try {
    $json = (LocationIP::instance('787e80c32f40cc6ad4f529dccbd5e51f'))->setHttpClientOptions([
        'timeout' => 2.0,
    ])->getLocation('61.145.213.26');
    var_dump($json);
}catch (\Exception $e)
{
    var_dump($e->getMessage());
}
