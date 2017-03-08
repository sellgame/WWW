<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/*
 *获取真实ip地址
 *
 */
function getip($type=1){
	$ip='';
	if (getenv('HTTP_CLIENT_IP')) $ip = getenv('HTTP_CLIENT_IP');  
	else if(getenv('HTTP_X_FORWARDED_FOR')) $ip = getenv('HTTP_X_FORWARDED_FOR');  
    else if(getenv('REMOTE_ADDR')) $ip = getenv('REMOTE_ADDR');  
	else $ip = "";
	if($type==1) $ip = sprintf('%u',ip2long($ip));
	$ip = empty($ip)?0:$ip;
	return $ip;
}

/*
 *专题关键词分割处理
 *
 */
function getkey($str){
	if(empty($str)) return false;
	$arr = explode(';', $str);
	$rarr =array();
	foreach ($arr as $key => $value) {
		$strtem = trim($value);
		if(stripos($strtem, 'ISBN:')===0){
			$rarr['isbn'] = array_push(ltrim($strtem,'ISBN:'));
		}
		else if(stripos($strtem, 'ISSN:')===0){
			$rarr['issn'] = array_push(ltrim($strtem,'ISSN:'));
		} else {
			$rarr['keys'] = array_push($strtem);
		}
	}
	return $rarr;
}