<?PHP
/**
  * 获取列表页中的A标签地址
  * 
  * @param string $msg      内容
  * @param string $filepath 保存文件
  * @return void
  */

function stripLinks($document)
{	
	preg_match_all("'<\s*a\s.*?href\s*=\s*			# find <a href=
					([\"\'])?					# find single or double quote
					(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching
													# quote, otherwise match up to next space
					'isx",$document,$links);
						

	// catenate the non-empty matches from the conditional subpattern

	while(list($key,$val) = each($links[2]))
	{
		if(!empty($val))
		$match[] = $val;
	}				
		
	while(list($key,$val) = each($links[3]))
	{
		if(!empty($val))
		$match[] = $val;
	}		
		
	// return the links
	return $match;
}