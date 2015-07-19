<?php
namespace Api\Controller;

use Common\Library\Baidu;

class BaiduController extends BaseController {

    protected $mBaidu = null;

    public function _initialize()
    {
        parent::_initialize();

        $this->mBaidu = new Baidu();
    }

    # 空操作
    public function _empty()
    {
        $this->ajaxResponse( 404, 'Not method', '' );
    }

    /**
     * 获取歌曲列表
     * @return [type] [description]
     */
    public function lists()
    {

    }

    /**
     * 获取歌曲信息
     * @return [type] [description]
     */
    public function detail()
    {

        if( $this->hasParams('id') )
        {
            $params = $this->_params;

            $detail = $this->mBaidu->getDetailById( $params['id'] );

            if( $detail )
                $this->ajaxResponse( 0, 'success', $detail );
            else
                $this->ajaxResponse( 500, 'not found', '' );
        }
        else
        {
            $this->ajaxResponse( 500, 'not found id' );
        }

    }

    /**
     * 获取分类
     * @return [type] [description]
     */
    public function type()
    {
        $result = $this->mBaidu->getTypeList();
        if( $result )
            $this->ajaxResponse( 0, 'success', $result['channel_list'] );
        else
            $this->ajaxResponse( 500, 'error' );
    }
}