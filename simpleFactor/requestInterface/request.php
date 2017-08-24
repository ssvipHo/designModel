<?php
/**
 * Created by PhpStorm.
 * User: hebingsong
 * Date: 2017/8/24
 * Time: 上午11:00
 */

namespace simpleFactor\requestInterface;


interface request
{
    public function request($address, $method, array $option = []);

    public function get($address, array $option = []);

    public function post($address);
}