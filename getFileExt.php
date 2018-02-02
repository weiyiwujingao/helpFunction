<?php
/**
  * 获得文件的小写后缀名，其实就是返回最后的.后面的字符
  * 
  * @param $string filePath 文件全名
  */
function getFileExt($filePath)
{
	return(trim(strtolower(substr(strrchr($filePath, '.'), 1))));
}