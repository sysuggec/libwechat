<?php

class HttpRequest
{
	/*
	 * 功能：发送post请求，参数格式为json
	 * 参数：requestUrl:请求的url地址，postDataArr：post参数组成的关联数组
	 * 返回：返回结果对象
	 */
	public static function postJsonData($requestUrl,$postDataArr)
	{
		$result = new stdClass();
		$headers = array("Content-type: application/json");
		$url = $requestUrl;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置超时

		if(0 === strpos(strtolower($url), 'https')) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
	
		}
		curl_setopt($ch, CURLOPT_POST, TRUE);
		$data = $postDataArr;
		echo json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		// exec
		$response = curl_exec($ch);
		var_dump($response);
		// exec failure
		if ($response === false) {
			
			$result->status = false;
			$result->message = curl_error($ch);
			var_dump(curl_getinfo($ch));
		}
		// exec success
		else {
			$result->status = true;
			$result->message = curl_error($ch);
			$result->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($result->code == 200) {
				$headSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				//$result->head = substr($response, 0, $headSize);
				//$result->body = substr($response, $headSize);
				$result->body = $response;
			}
		}
		// return result
		curl_close($ch);
		//syslog(LOG_INFO, json_encode($result));
		return $result;
	}
	
	/**
	 * 功能：get方式提交http请求
	 * 参数：requestUrl为查询的url参数
	 * 返回：返回结果对象
	 */
	public static function  getData($requestUrl)
	{
		$result = new stdClass();
		$headers = array("Content-type: application/json");
		$url = $requestUrl;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置超时
		
		if(0 === strpos(strtolower($url), 'https')) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
		
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		// exec
		$response = curl_exec($ch);
		var_dump($response);
		// exec failure
		if ($response === false) {
				
			$result->status = false;
			$result->message = curl_error($ch);
			var_dump(curl_getinfo($ch));
		}
		// exec success
		else {
			$result->status = true;
			$result->message = curl_error($ch);
			$result->code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($result->code == 200) {
				$headSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
				echo "\nresponse:".$response."\n";
				//$result->head = substr($response, 0, $headSize);
				$result->body = $response;
			}
		}
		// return result
		curl_close($ch);
		//syslog(LOG_INFO, json_encode($result));
		return $result;
		
	}
	
}


?>