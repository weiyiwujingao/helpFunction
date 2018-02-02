<?php
/**
* 截取中文汉字,1个汉字等于1个长度
* $str 被截取的字符串
* $start 开始位置
* $len 要截取的长度
*/
function m_substr ($str, $start, $len) {
     preg_match_all('/[\x80-\xff]?./', $str, $ar);
     if (func_num_args() >= 3) {
          $end = func_get_arg(2);
          return join('', array_slice($ar[0], $start, $end));
     } else {
          return join('', array_slice($ar[0], $start));
     }
}
