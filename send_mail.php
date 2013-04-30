<?php
	@session_start();

header ('Content-type: text/html; charset=utf-8');
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT"); 
header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache"); 
if($_POST['n']=="ok"){
	$mailtitle	=	"[全國聯盟家電維修服務] 聯絡我們"; //設定郵件標題
	$mailbody = "";
	foreach($_POST as $field=>$content){
		if($field != "B1" and $field != "B2" and $field != "n"  and $field != "key" ){
			$mailbody .= $field.": ".$content."<br />";
		}
	}
$mailto = "fendyy_12321@yahoo.com.tw";  
$headers = "From: {$mailto} \r\nReply-To: {$mailto} \nContent-Type: text/html; charset=\"UTF-8\" ";

// echo $row_im_templates_get['header'];
if(strlen($mailto)<>0 ){
	if (mail($mailto, $mailtitle, $mailbody, $headers )) {
		$messages = ("訊息寄出成功!");
	} else {
	  $messages = ("訊息未成功寄出...");
	}
}else{
	$messages =  "每一個欄位的資料都要填寫完整唷 !!";
}
echo "<script language=\"JavaScript\" type=\"text/JavaScript\">window.alert(\"$messages\");top.location.href='{$_SERVER['HTTP_REFERER']}';</script>";
exit;
}
header("Location: /");
?>