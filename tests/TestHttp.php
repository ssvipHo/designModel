<?php


require __DIR__ . '/../init.php';
class TestHttp extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $factor = new \simpleFactor\factor();
        $httpObj = $factor->create('http');
        $url = 'https://tieba.baidu.com/f?kw=%C0%EE%D2%E3&fr=ala0&tpl=5';

        $httpObj->get($url);
        $this->assertEquals(200, $httpObj->curl_code);
    }
}
