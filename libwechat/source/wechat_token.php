<?php
/**
 *管理微信公众号的access_token
 */
require_once("http_request.php");
define("URL_GET_ACCESS_TOKEN", "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential");
class WxTokenUtil
{
	/**
	 * 获取公众号的access_token
	 * @param string $appid 微信公众号的appid
	 * @param string $secret 微信公众号的secret
	 * @return mixed|NULL
	 */
	public static function getAccessToken($appid="wxf8795ba8db75e14c",$secret="1becf2c3ae111db8923051d622d8ca75")
	{
		$url=URL_GET_ACCESS_TOKEN."&appid=".$appid."&secret=".$secret;
		$result=HttpRequest::getData($url);
		var_dump($result);
		if($result->code==200)
		{
			echo "\n data:".$result->body;
			$resultArr=json_decode($result->body,true);
			var_dump($resultArr);
			if($resultArr["errcode"]==0)
			{
				return $resultArr["access_token"];
			}else{
				return null;
			}	
		}else{
			return null;
		}

	}
}



?>
