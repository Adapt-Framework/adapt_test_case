<?php

namespace adapt\test_case;

use PHPUnit_Framework_TestCase;

class adapt_test_case extends PHPUnit_Framework_TestCase
{

    public $http;
    public $adapt;
    
    
    function __construct()
    {
        print_r($this->adapt);
        define('TEMP_PATH', sys_get_temp_dir() . '/');
        define('ADAPT_PATH', '/var/www/html/horizon/adapt/');
        define('ADAPT_VERSION', '2.0.5');
        define('ADAPT_STARTED', true);
        ob_start();
        require(ADAPT_PATH . 'adapt/adapt-' . ADAPT_VERSION . '/boot.php');
        ob_end_clean();
        $this->adapt = $adapt;
    }
    
    public function post($url, $data = null, $content_type = "application/json"){
        $http =  new \adapt\http();
        $response = $http->post($url, $data, ['content-type' => $content_type]);
        return $response;
    }
    public function get($url){
        $http =  new \adapt\http();
        $response = $http->get($url);
        return $response;
    }
    
}
