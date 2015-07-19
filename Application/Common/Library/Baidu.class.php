<?php
namespace Common\Library;

use Common\Library;
class Baidu extends Base{

	protected $inlay = array(
		'hashcode' => '',
		'BAIDUID' => '',
		'BAIDUSID' => ''
	);
	
    public function __construct()
    {
    	parent::__construct();
    	$inlay = F( 'baidu' );
    }

    public function __destruct()
    {
    	F( 'baidu', $this->inlay );
    }

    # 获取百度ID
	public function getBaiduId()
	{
		$this->_header['nobody'] = true;

		$result = http( 'http://fm.baidu.com', null, null, $this->header );
		
		$this->inlay[''] = 

        return $id;
	}

	# 获取歌曲信息
	public function getDetailById( $id = null )
	{

	}

	public function lists( $params = array() )
	{
		$number = 100;


	}
	
	# 获取分类列表
	public function getTypeList()
	{
		$url = 'http://fm.baidu.com/dev/api/?tn=channellist&_='.time();
		
		$result = http( $url );
		
		if( isset($result['content']) )
		{
			$row = json_decode( $result['content'], true );
			return $row;
		}
		else
			return false;
	}

	# 获取场景列表
	public function getScence()
	{
		$url = 'http://music.baidu.com/data/scene/list?hashcode=' . $this->hashcode . '&_=' . time();

		$result = http( $url );
		if( isset( $result['content'] ) )
		{
			$row = json_decode( $result['content'], true );
			
		}
		else
		{
			return false;
		}
	}

}