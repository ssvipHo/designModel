<?php

namespace simpleFactor;


use simpleFactor\requestInterface\request;

class pop3 implements request
{
    public $email;
    public $password;
    public $imap;

    public function request($url, $method, array $data = [], array $option = [])
    {

    }

    public function get($address, array $option = [])
    {
        echo 'This is pop3->get';
        return 'pop3';
    }

    public function post($url, array $option = [])
    {

    }

}