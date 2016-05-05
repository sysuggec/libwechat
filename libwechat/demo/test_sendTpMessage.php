<?php
require_once '../source/wechat_message.php';
require_once 'wechatConstants.php';

//template模板id和参数定义
$templates=array(
		"G9AYs05Ec8bwUomKSz3f8aipnhJd1j9UabcRJcyGFi0"=>array(
				"head"=>array("value"=>"","color"=>"#ff3300"),
				"body"=>array("value"=>"","color"=>"#ff3300"),
				"end"=>array("value"=>"","color"=>"ff3300"))		
);

//获取公众号的token（由于微信有获取token的频率限制，所以这个再实际使用的时候，需要在公共的地方存储起来）
$token=WxTokenUtil::getAccessToken(WX_APPID,WX_SECRET);
echo "\ntoken=".$token."\n";
$tpid="G9AYs05Ec8bwUomKSz3f8aipnhJd1j9UabcRJcyGFi0";
$templates[$tpid]["head"]["value"]="";
$templates[$tpid]["body"]["value"]="夺宝任务已经成功执行！";
$templates[$tpid]["end"]["value"]=date("y-m-d h:i:s",time());
WxMessageUtil::sendTpMessage($token, "oQtMHwiPcsv-Pbj9CEMl_0U1V1eE", $tpid, "", $templates[$tpid]);

//WxMessageUtil::sendKfMessage($token, "oQtMHwt85InT9pPS1swGJ2OZRrnM", "hello world,I'm from php");
//$tp_params=array("system"=>array("value"=>"欢乐夺宝","color"=>"#ff3300"),"limit"=>array("value"=>"1000","color"=>"#ff3300"));

?>