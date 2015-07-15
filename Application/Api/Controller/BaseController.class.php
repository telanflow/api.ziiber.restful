<?php
namespace Api\Controller;
use Think\Controller\RestController;

class BaseController extends RestController {
	protected $allowMethod    = array('get','post','put');  // REST允许的请求类型列表
    protected $allowType      = array('html','xml','json'); // REST允许请求的资源类型列表
    protected $_params 		  = array();
    
	# 主入口
	public function _initialize(){
		
		parent::_initialize();

		if( IS_GET )
			$this->_params = I('get.');
		if( IS_POST )
			$this->_params = I('post.');
		if( IS_PUT )
			$this->_params = I('put.');
		if( IS_DELETE )
			// $this->_params = I('delete.');
		
	}

	# 是否存在参数
	protected function hasParams( $key ){
		if( !isset($this->_params[$key]) or empty($this->_params[$key]) )
            return false;
        else
            return true;
	}

	# 检查缺少的参数
	protected function checkParams( $keys = array() ){

		foreach ($keys as $key) 
            if( !$this->hasParams($key) )
            {
                $this->lackofParams( $key );
                break;
                return false;
            }
        return true;

	}

}