<?php
namespace Api\Controller;

use Think\Controller;

class EmptyController extends BaseController{

	public function index()
	{

		$this->ajaxResponse( 404, 'error', '' );

	}

}