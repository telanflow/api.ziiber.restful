<?php
namespace Common\Library;

class Base{

    // 初始化
    public function __construct(){
        echo 'BaseExt';
        
    }

    // 请求
    public function _request( $method = 'get', $url = null, $params = array() ){

    }
}