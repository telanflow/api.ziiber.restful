<?php
namespace Api\Controller;

use Think\Controller;
use Common\Library\Baidu;

class IndexController extends BaseController {


    public function index(){
    	
        $result = http( 'http://fm.baidu.com' );
        unset($result['content']);
        var_dump($result);

    }

    /**
     * 获取歌曲列表
     * @return [type] [description]
     */
    protected function lists(){



    }

}