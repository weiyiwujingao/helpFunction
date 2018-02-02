<?php
/**
 * 获取URL的一级域名
 * @param unknown $url
 * @return string
 */
function getHostDomain($url)
{
	$domain = '';
    if(empty($url)){ return $domain; } //URL为空
    $data = parse_url(trim($url));
    if(!isset($data['host'])){
        return $domain;
    }
    $sdata = $data['host'];
    $data = explode('.', $sdata);
    $domain = $data[count($data) - 2] . '.' . $data[count($data) - 1];
    if(strpos($sdata, 'com.cn')){
        $domain = $data[count($data) - 3] . '.' . $data[count($data) - 2] . '.' . $data[count($data) - 1];
    }
    
    return $domain;
}