<?php defined('BASEPATH') OR exit('No direct script access allowed');
/****************************************************************
 * 全局公共函数
 *---------------------------------------------------------------
 * Copyright (c) 2004-2017 CNFOL Inc. (http://www.cnfol.com)
 *---------------------------------------------------------------
 * $author:wujg $addtime:2017-04-07
 ****************************************************************/

/**
  * 输出友好的调试信息
  *
  * @param mixed $vars 需要判断的日期
  * @return mixed
  */
function t($vars)
{
	if(is_array($vars))
		exit("<pre><br>" . print_r($vars, TRUE) . "<br></pre>".rand(1000,9999));
	else
		exit($vars);
}
function pre($param='') {
    echo '<br/><pre>';
    var_dump($param);
    echo '</pre>';
}