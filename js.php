<?php 
********************************************************************************************
'函数名：JS_BACK()
'功  能：实现页面跳转
'返回值: 无
*/
function JS_BACK(){
	die("<script language='javascript'>window.history.go(-1);</script>");
}
/********************************************************************************************
'函数名：JS_REFRESH()
'功  能：关闭弹出窗口并刷新父页面
'返回值: 无
*/
function JS_REFRESH(){
	die("<script language='javascript'>window.parent.location.href=window.parent.location.href;</script>");
}
/********************************************************************************************
'函数名：JS_PARENTGO()
'功  能：关闭弹出窗口并跳转父窗口
'返回值: 无
*/
function JS_PARENTGO($url){
	die("<script language='javascript'>window.parent.location.href='$url';</script>");
}
/********************************************************************************************
'函数名：JS_CLOSE_THICKBOX()
'功  能：关闭弹出窗口并刷新父页面
'返回值: 无
*/
function JS_CLOSE_THICKBOX(){
	die("<script language='javascript'>window.parent.TB_remove();</script>");
}
function JS_CLOSE(){
	die("<script language='javascript'> window.close();</script>");
}
function JS_CLOSE_ONCE(){
	die("<script language='javascript'> window.opener=null;window.open('','_self');window.close();</script>");
}
function JS_MESSAGE_CON($msg , $y_goto , $n_goto){
    $html  = "<html>\r\n<head>\r\n<title>提示信息</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\" />\r\n";
	$html .= "<base target='_self'/>\r\n</head>\r\n<body leftmargin='0' topmargin='0'>\r\n<center>\r\n";
	$html .="<script language='javascript'>if(window.confirm('$msg')){window.location.href='$y_goto';}else{window.location.href='$n_goto';}</script>";
	$html .= "\r\n</center>\r\n</body>\r\n</html>\r\n";	
	die($html) ;
}