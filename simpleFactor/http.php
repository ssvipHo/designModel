<?php

namespace simpleFactor;

use simpleFactor\requestInterface\request;

class http implements request
{
    public $time_out = 5;
    public $curl_info;
    public $curl_code;
    public $header;

    public function __construct()
    {

    }

    public function checkUrl($url)
    {
        return $url;
    }

    public function request($url, $method, array $data = [], array $option = [])
    {
        switch ($method)
        {
            case 'get':
                return $this->get($url, $option);
                break;
            case 'post':
                return $this->post($url, $data, $option);
                break;
        }
    }

    /**
     * @param $url
     * @param array $option
     *
     * @return mixed
     */
    public function get($url, array $option = [])
    {
        // 校验地址
        if (!$this->checkUrl($url))
        {
            throw new \InvalidArgumentException('错误的url地址');
        }

        $this->time_out = isset($option['time_out']) ? $option['time_out'] : 0;
        $this->header = isset($option['header']) ? $option['header'] : [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); // 根据 Location: 重定向时，自动设置 header 中的Referer:信息
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->time_out); // 超时
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取的信息以字符串返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_POST, false); // get方法。
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        $result = curl_exec($ch);
        $this->curl_info = curl_getinfo($ch);
        $this->curl_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $result;
    }

    public function post($url, array $data = [], array $option = [])
    {

    }
}