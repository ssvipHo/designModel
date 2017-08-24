<?php
/**
 * Created by PhpStorm.
 * User: hebingsong
 * Date: 2017/8/24
 * Time: 下午2:03
 */

namespace simpleFactor;

class factor
{
    public $obj;

    public function __construct()
    {
        $this->obj = [
            'http' => http::class,
            'pop3' => pop3::class,
        ];
    }

    public function create($objName)
    {
        if (!array_key_exists($objName, $this->obj))
        {
            throw new \InvalidArgumentException('is not valid obj');
        }

        return new $this->obj[$objName]();
    }
}