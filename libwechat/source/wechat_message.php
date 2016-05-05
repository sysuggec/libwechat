
<?php
date_default_timezone_set('prc');
/**
 微信api发送消息的函数库
 */
require_once 'http_request.php';
require_once 'wechat_token.php';
//发送客服信息的api地址
define("URL_SEND_KF_MESSAGE","https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=");
//发送模板消息的api地址（post参数要和模板）
define("URL_SEND_TP_MESSAGE","https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=");

class WxMessageUtil
{
	/**
	 * 发送客服消息给用户
	 * @param  string $access_token 微信的token
	 * @param  string $openid 接收信息用户的openid
	 * @param  string $message 发送的消息内容
	 * @return array $resultArr 返回结果的关联数组
	 */
	public static function sendKfMessage($access_token,$openid,$message)
	{
		$data=array("touser"=>$openid,"msgtype"=>"text","text"=>array("content"=>$message));
		var_dump($data);
		$requestUrl=URL_SEND_KF_MESSAGE.$access_token;
		$result=HttpRequest::postJsonData($requestUrl, $data);
		var_dump($result);
		echo "end\n";
		echo $result->body;
		$resultArr=json_decode($result->body,true);
		var_dump($resultArr);
		return $resultArr;
	}
	
	/**
	 * 发送模板消息
	 * @param string $access_token 微信的token
	 * @param string $openid 接收信息用户的openid
	 * @param string $tp_id 模板ID
	 * @param string $url  消息跳转链接
	 * @param array $tp_params 模板参数
	 * @return array $resultArr 结果json的关联数组 
	 */
	public static function sendTpMessage($access_token,$openid,$tp_id,$url,$tp_params)
	{
		$data=array("touser"=>$openid,"template_id"=>$tp_id,"url"=>$url,"topcolor"=>"#FF0000","data"=>$tp_params);
		var_dump($data);
		$requestUrl=URL_SEND_TP_MESSAGE.$access_token;
		$result=HttpRequest::postJsonData($requestUrl, $data);
		var_dump($result);
		echo "end\n";
		echo $result->body;
		$resultArr=json_decode($result->body,true);
		var_dump($resultArr);
		return $resultArr;	
	}

}

?>