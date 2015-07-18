<?php
namespace Common\Library;

use Common\Library;
class Baidu extends Base{

    public function __construct()
    {
    	parent::__construct();

        echo 'Baidu';
    }

    # 获取百度ID
	public function getBaiduId()
	{
		$this->_header['nobody'] = true;

		$result = http( 'http://fm.baidu.com', null, null, $this->header );
		
        return $id;
	}
}