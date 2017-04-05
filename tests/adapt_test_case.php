<?php

namespace adapt\test_case;

use PHPUnit\Framework\TestCase;

class adapt_test_case extends TestCase
{

    public $http;
    public $adapt;
    
    
    function __construct()
    {
        define('TEMP_PATH', sys_get_temp_dir() . '/');
        define('ADAPT_PATH', '/var/www/html/horizon/adapt/');
        define('ADAPT_VERSION', '2.0.0');
        define('ADAPT_STARTED', true);
        require(ADAPT_PATH . 'adapt/adapt-' . ADAPT_VERSION . '/boot.php');
        $this->adapt = $adapt;
        $this->http =  new \adapt\http();
    }
    
    public function post($url, $data = null, $content_type = "application/json"){
        return $this->http->post($url, $data, ['content-type' => $content_type]);
    }
}
