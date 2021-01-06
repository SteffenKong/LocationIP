# LocationIP
一款基于高德地图的IP定位软件

#### 调用的方法
````php
<?php
 $data = (LocationIP::instance(APPKEY))->setHttpClientOptions([
        'timeout' => 2.0,
    ])->getLocation(IP地址);
````