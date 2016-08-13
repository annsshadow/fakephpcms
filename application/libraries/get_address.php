<?php

class getaddress {

	public function get_address($ip) {
		$default = 'UNKNOWN';
		$curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
		//调用IP库
		$url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);

		$ch = curl_init();
		$curl_opt = array(
			//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
			CURLOPT_FOLLOWLOCATION => 1,
			//启用时会将头文件的信息作为数据流输出
			CURLOPT_HEADER => 0,
			//将 curl_exec()获取的信息以文件流的形式返回，而不是直接输出
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_USERAGENT => $curlopt_useragent,
			CURLOPT_URL => $url,
			//设置cURL允许执行的最长秒数
			CURLOPT_TIMEOUT => 10,
			CURLOPT_REFERER => 'http://' . $_SERVER['HTTP_HOST'],
		);
		curl_setopt_array($ch, $curl_opt);

		$content = curl_exec($ch);

		if (!is_null($curl_info)) {
			$curl_info = curl_getinfo($ch);
		}

		//匹配特定格式
		curl_close();
		if (preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs)) {
			$city = $regs[1];
		}
		if (preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs)) {
			$state = $regs[1];
		}

		if ($city != '' && $state != '') {
			$location = $city . ', ' . $state;
			return $location;
		} else {
			return $default;
		}
	}
}