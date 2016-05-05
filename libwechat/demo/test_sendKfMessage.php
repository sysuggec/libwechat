<?php
require_once '../source/wechat_message.php';
require_once 'wechatConstants.php';

//获取公众号的token（由于微信有获取token的频率限制，所以这个再实际使用的时候，需要在公共的地方存储起来）
$token=WxTokenUtil::getAccessToken(WX_APPID,WX_SECRET);
echo "\ntoken=".$token."\n";
WxMessageUtil::sendKfMessage($token, "oQtMHwiPcsv-Pbj9CEMl_0U1V1eE", "hello world,I'm from php");

?>