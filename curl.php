<?php 
/****************************************************************
 *---------------------------------------------------------------
 * Copyright (c) 2004-2016 CNFOL Inc. (http://www.cnfol.com)
 *---------------------------------------------------------------
 * $author:wujg $addtime:2017-11-15
 ****************************************************************/ 
/**
  * CURL请求
  *
  * @param string  $url     请求地址
  * @param array   $data    请求数据 key=>value 键值对
  * @param integer $timeout 超时时间,单位秒
  * @param integer $ishttp  是否使用https连接 0:否 1:是
  * @return array
  */
function curl_post($url, $data, $timeout = 5)
{
	$ishttp = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
	
	$ch = curl_init();
	if (is_array($data)) {
	    $data = http_build_query($data);
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

	if($ishttp)
	{
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	}
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	$result['data'] = curl_exec($ch);
	$result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	 
	curl_close($ch);

	return $result;
}

/**
 * 远程获取数据，GET模式
 * 注意：
 * 1.使用Crul需要修改服务器中php.ini文件的设置，找到php_curl.dll去掉前面的";"就行了
 * 2.文件夹中cacert.pem是SSL证书请保证其路径有效，目前默认路径是：getcwd().'\\cacert.pem'
 * @param $url 指定URL完整路径地址
 * return 远程输出的数据
 */
function curl_get($url, $timeout = '30') {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); // 设置超时限制防止死循环
    $responseText = curl_exec($curl);
    //var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
    curl_close($curl);

    return $responseText;
}