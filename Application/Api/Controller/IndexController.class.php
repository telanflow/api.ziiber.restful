<?php
namespace Api\Controller;
use Think\Controller;

class IndexController extends BaseController {


    public function index(){
    	
    	if( $this->hasParams('id') ){
    		
    	}
    	echo $this->_method;

    }

    /**
     * 获取歌曲列表
     * @return [type] [description]
     */
    protected function lists(){



    }

}