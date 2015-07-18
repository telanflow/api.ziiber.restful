<?php
namespace Api\Controller;

use Common\Library\Baidu;

class BaiduController extends BaseController {

    protected $mBaidu = null;

    public function _initialize()
    {
        $this->mBaidu = new Baidu();
    }

    public function rest()
    {
    	
        echo 'rest';

    }

    /**
     * 获取歌曲列表
     * @return [type] [description]
     */
    protected function lists()
    {



    }

}