<?php
/**
 * 判断是否存在目录，不存在创建一个新的目录
 *
 * @param string $dir   目录串
 * @param string $module 权限
 * @return string
 */
function mk_dir($dir, $module=0775)
{
	if(!is_dir($dir))
	{
		if(!mkdir($dir, $module, TRUE))
		{
			@error_log($dir.'-'.'mkdir:create dir fail'.date('Ymd H:i:s').PHP_EOL, 3, LOG_PATH . '/make_dir.log');
			return false;
		}
	}
	create403Index($dir);
	return true;
}

/**
 *
 * 在空文件夹里创建403的index.html文件
 *
 */
function create403Index($fileFolder){
    $fileName = $fileFolder . '/index.html';
    if(!file_exists($fileName)){
        $fContent = '<!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

<p>Directory access is forbidden.</p>

</body>
</html>
    ';
        file_put_contents($fileName, $fContent);
    }

}
/**
  * 日志加强版
  *
  * @param string $msg  股票代码
  * @param string $file 日志文件名
  * @return boolean
  */
function logs($msg, $file = 'system',$date='',$type='.log')
{
	
	$log = '['.date('H:i:s').']['.$msg.']'.PHP_EOL;
	$date = $date ? $date : date('Ymd');
	$filePath = LOG_PATH . $file . '/'  .$date . $type;
	
	if(mk_dir(LOG_PATH . $file)==false){
		return false;
	}

	return @error_log($log, 3, $filePath);
}