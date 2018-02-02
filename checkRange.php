<?php
/**
  * 判断数字的范围合法性
  *
  * @param array   $number 需要判断的数字
  * @param integer $start  起始范围
  * @param integer $end    结束范围
  * @return boolean
  */
function checkRange($number, $start = 1, $end = 150)
{
	if(!is_array($number)) $number = array($number);

	foreach($number as $rs)
	{
		if($rs > $end || $rs < $start)
			return FALSE;
	}
	return TRUE;
}