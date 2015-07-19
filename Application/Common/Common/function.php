<?php

/**
 * HTTP请求
 * @param  string $url    url
 * @param  array  $params 参数
 * @param  string $method 请求方式 get post
 * @param  array  $header 协议头
 * @return [type]         [description]
 */
function http( $url = '', $params = array(), $method = 'get', $header = array() ){

	$ret    = null;
	$result = null;
	$method = strtolower($method);

	# 初始化curl
	$ch = curl_init();

	# Default Option
	curl_setopt($ch, CURLOPT_FAILONERROR, true); 	# 显示HTTP状态码
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); # curl_exec 不直接输出到浏览器

	# 请求类型
	if( $method == 'post' )
	{
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
	}
	elseif( $method == 'put' )
	{
		curl_setopt($ch, CURLOPT_PUT, true);
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
	}
	else
	{
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		if( !empty($params) )
		{
			$link = array();
			foreach ($params as $key => $value)
				$link[] = $key.'='.$value;
			$url .= '?'.implode('&', $link);
		}
	}
	
	# 设置url	
	curl_setopt($ch, CURLOPT_URL, $url);

	# 一个用来设置HTTP头字段的数组。使用如下的形式的数组进行设置： array('Content-type: text/plain', 'Content-length: 100') 
	if( !is_assoc($header) )
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

	# 启用时将不对HTML中的BODY部分进行输出。
	if( isset($header['nobody']) )
		curl_setopt($ch, CURLOPT_NOBODY, $header['nobody']);
	else
		curl_setopt($ch, CURLOPT_NOBODY, false);

	# 启用时会将头文件的信息作为数据流输出
	if( isset($header['header']) )
		curl_setopt($ch, CURLOPT_HEADER, $header['header']);
	else
		curl_setopt($ch, CURLOPT_HEADER, false);

	# User_Agent
	if( isset($header['useragent']) )
		curl_setopt($ch, CURLOPT_USERAGENT, $header['useragent']);

	# Cookie
	if( isset($header['cookie']) )
	{
		if( is_array($header['cookie']) )
		{
			$cookies = array();
			foreach ($header as $key => $value) {
				$cookies[] = $key . '=' . $value;
			}
			curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
		}
		else
			curl_setopt($ch, CURLOPT_COOKIE, $header['cookie']);
	}

	# 读取文件中的cookie
	if( isset($params['cookiefile']) )
		curl_setopt($ch, CURLOPT_COOKIEFILE, $params['cookiefile']);
	
	# 保存cookie到文件
	if( isset($params['cookiejar']) )
		curl_setopt($ch, CURLOPT_COOKIEJAR, $params['cookiejar']);

	# Referer
	if( isset($header['referer']) )
		curl_setopt($ch, CURLOPT_REFERER, $header['curlopt_referer']);
	else
		curl_setopt($ch, CURLOPT_AUTOREFERER, true); # 自动设置Referer

	# Encoding
	# HTTP请求头中"Accept-Encoding: "的值。
	# 支持的编码有"identity"，"deflate"和"gzip"。如果为空字符串""，请求头会发送所有支持的编码类型。 
	if( isset($header['encoding']) )
		curl_setopt($ch, CURLOPT_ENCODING, $header['encoding']);

	# HTTP代理通道
	# 一个用来连接到代理的"[username]:[password]"格式的字符串
	if( isset($header['proxy']) )
	{
		curl_setopt($ch, CURLOPT_PROXY, true);
		curl_setopt($ch, CURLOPT_PROXYUSERPWD, $header['proxy']);
	}

	# 发送请求
	$result = curl_exec($ch);

	if( $result !== false )
	{
		$info = curl_getinfo($ch);
		$arr  = array(
			'cookie'  =>	$cookie,
			'content' =>	$result
		);

		$ret = array_merge( $arr, $info );
	}
	else
		$ret = false;
	
	# 关闭curl
	curl_close($ch);

	return $ret;
}


function is_assoc($arr) {
    return array_keys($arr) !== range(0, count($arr) - 1);  
}  



