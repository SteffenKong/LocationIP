<?php

namespace SteffenKong\LocationIP;

use GuzzleHttp\Client;

/**
 * Class LocationIP
 * @package SteffenKong\LocationIP
 * 定位IP
 */
class LocationIP
{

    protected $key;

    private $baseUrl = 'https://restapi.amap.com/';

    private $uri = 'v3/ip';

    protected $guzzleOptions = [];

    // 私有化克隆
    private function __clone(){}

    private static $instance = null;


    /**
     * @param string $key
     * @return LocationIP
     * 单例
     */
    public static function instance(string $key)
    {
        return self::$instance = self::$instance ?? new self($key);
    }


    /**
     * LocationIP constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }


    /**
     * @return Client
     * 获取http客户端
     */
    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }


    /**
     * @param array $options
     * @return LocationIP
     * 配置http客户端
     */
    public function setHttpClientOptions(array $options)
    {
        $this->guzzleOptions = $options;
        return $this;
    }


    /**
     * @param $uri
     * @param $ip
     * @param string $output
     * @return false|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 获取定位
     */
    public function getLocation($ip,$output = 'json')
    {
        $query = [
            'ip' => $ip,
            'key' => $this->key,
            'output' => $output
        ];
        $aa = $this->getHttpClient()->get($this->baseUrl.$this->uri,[
            'query' => $query
        ])->getBody()->getContents();

        return $this->parseResult($aa,$output);
    }


    /**
     * @param $result
     * @param $output
     * @return false|string
     * 解析响应数据
     */
    public function parseResult($result,$output)
    {
        if ($output == 'json')
        {
            return \json_decode($result);
        }else {
            // xml处理
            return "";
        }
    }

}

