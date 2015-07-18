<?php
namespace Api\Controller;
use Think\Controller\RestController;

class BaseController extends RestController {
	
	protected $allowMethod    = array('get','post','put');  // REST允许的请求类型列表
    protected $allowType      = array('html','xml','json'); // REST允许请求的资源类型列表
    protected $_params 		  = array();
    protected $_header		  = array();

	# 主入口
	public function _initialize()
	{
		parent::_initialize();

		if( IS_GET )
			$this->_params = I('get.');
		if( IS_POST )
			$this->_params = I('post.');
		if( IS_PUT )
			$this->_params = I('put.');
		if( IS_DELETE )
			// $this->_params = I('delete.');
            exit('not delete');
	}

	# 是否存在参数
	protected function hasParams( $key )
	{
		if( !isset($this->_params[$key]) or empty($this->_params[$key]) )
            return false;
        else
            return true;
	}

	# 检查缺少的参数
	protected function checkParams( $keys = array() )
	{
		foreach ($keys as $key) 
            if( !$this->hasParams($key) )
            {
                $this->lackofParams( $key );
                break;
                return false;
            }
        return true;
	}

	# ajax返回
	protected function ajaxResponse( $code, $message, $value = array() )
	{
		if( in_array( $code, array(404, 403, 500, 502) ) )
			$this->setHeader( $code );

		$ret = array(
			'code' => $code,
			'message' => $message,
			'value' => $value
		);

		$this->sendHeader();

		$this->ajaxReturn( $ret, 'json' );
	}

	# 设置http返回状态
	protected function sendHeader()
	{
		foreach ($this->_header as $value)
			header( $value );
	}

	# 添加header 状态到 $this->_header
	protected function setHeader( $code )
	{
		$status = array(
			// Informational 1xx
			100 => 'Continue',
			101 => 'Switching Protocols',
			// Success 2xx
			200 => 'OK',
			201 => 'Created',
			202 => 'Accepted',
			203 => 'Non-Authoritative Information',
			204 => 'No Content',
			205 => 'Reset Content',
			206 => 'Partial Content',
			// Redirection 3xx
			300 => 'Multiple Choices',
			301 => 'Moved Permanently',
			302 => 'Moved Temporarily ',  // 1.1
			303 => 'See Other',
			304 => 'Not Modified',
			305 => 'Use Proxy',
			// 306 is deprecated but reserved
			307 => 'Temporary Redirect',
			// Client Error 4xx
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			406 => 'Not Acceptable',
			407 => 'Proxy Authentication Required',
			408 => 'Request Timeout',
			409 => 'Conflict',
			410 => 'Gone',
			411 => 'Length Required',
			412 => 'Precondition Failed',
			413 => 'Request Entity Too Large',
			414 => 'Request-URI Too Long',
			415 => 'Unsupported Media Type',
			416 => 'Requested Range Not Satisfiable',
			417 => 'Expectation Failed',
			// Server Error 5xx
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
			502 => 'Bad Gateway',
			503 => 'Service Unavailable',
			504 => 'Gateway Timeout',
			505 => 'HTTP Version Not Supported',
			509 => 'Bandwidth Limit Exceeded'
		);
		
		if( array_key_exists( $code, $status ) )
			$this->_header[] = 'HTTP/1.1 '.$code.' '.$status[$code];
	}

}