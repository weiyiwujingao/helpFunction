 <?php  
 /**
  * 记录数据,统计出现次数
  * 
  * @param string $msg      内容
  * @param string $filepath 保存文件
  * @return blooer
  */
  function dataRecord($url,$recor,$filepath=''){
	if(!$filepath){
		$filepath = '/home/httpd/wine.collect.com/log/zimeiti/data/'.date(Ymd).'.php';
		if(!file_exists($filepath))
		{    
			//fopen($filepath,"w+");
			$data = array($url=>array($recor=>'1'));
			return file_put_contents($filepath, "<?php\nreturn ".var_export($data, TRUE).";\n?>");
	    }
	}
	$data = include  $filepath;
	if(!is_array($data)){
		$data = array($url=>array($recor=>'1'));
		return file_put_contents($filepath, "<?php\nreturn ".var_export($data, TRUE).";\n?>");
	}
	if(array_key_exists($url,$data))
		$data[$url][$recor] += 1;
	else
		$data[$url][$recor] = 1;
	return file_put_contents($filepath, "<?php\nreturn ".var_export($data, TRUE).";\n?>");
  }