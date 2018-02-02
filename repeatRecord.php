 <?php  
/**
  * 标题查询重复 简易判断是否重复
  * 
  * @param string $msg      内容
  * @param string $filepath 保存文件
  * @return blooer
  */
  function repeatRecord($title,$filepath=''){
	if(!$filepath){
		$filepath = '/home/httpd/wine.collect.com/log/zimeiti/'.date(Ym).'.log';
		if(!file_exists($filepath))
		{    
			fopen($filepath,"w+");
	    }
	}
	/* 提取日志里的数组 */
	$getArr = explode(PHP_EOL,file_get_contents($filepath));
	$title = md5($title);
	if(in_array($title,$getArr)){
		return true;
	}else{
		@error_log($title.PHP_EOL,3,$filepath);
		return　false;
	}
  }