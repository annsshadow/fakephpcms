<?php

class Curl {

	//CURL¾ä±ú
	private $ch = null;
	//CURLÖ´ÐÐÇ°ºóËùÉèÖÃ»ò·þÎñÆ÷¶Ë·µ»ØµÄÐÅÏ¢
	private $info = array();
	//CURL SETOPT ÐÅÏ¢
	private $setopt = array(
		//·ÃÎÊµÄ¶Ë¿Ú,httpÄ¬ÈÏÊÇ 80
		'port' => 80,
		//¿Í»§¶Ë USERAGENT,Èç:"Mozilla/4.0",Îª¿ÕÔòÊ¹ÓÃÓÃ»§µÄä¯ÀÀÆ÷
		'userAgent' => '',
		//Á¬½Ó³¬Ê±Ê±¼ä
		'timeOut' => 30,
		//ÊÇ·ñÊ¹ÓÃ COOKIE ½¨Òé´ò¿ª£¬ÒòÎªÒ»°ãÍøÕ¾¶¼»áÓÃµ½
		'useCookie' => true,
		//ÊÇ·ñÖ§³ÖSSL
		'ssl' => false,
		//¿Í»§¶ËÊÇ·ñÖ§³Ö gzipÑ¹Ëõ
		'gzip' => true,

		//ÊÇ·ñÊ¹ÓÃ´úÀí
		'proxy' => false,
		//´úÀíÀàÐÍ,¿ÉÑ¡Ôñ HTTP »ò SOCKS5
		'proxyType' => 'HTTP',
		//´úÀíµÄÖ÷»úµØÖ·,Èç¹ûÊÇ HTTP ·½Ê½ÔòÒªÐ´³ÉURLÐÎÊ½Èç:"http://www.proxy.com"
		//SOCKS5 ·½Ê½ÔòÖ±½ÓÐ´Ö÷»úÓòÃûÎªIPµÄÐÎÊ½£¬Èç:"192.168.1.1"
		'proxyHost' => 'http://www.proxy.com',
		//´úÀíÖ÷»úµÄ¶Ë¿Ú
		'proxyPort' => 1234,
		//´úÀíÊÇ·ñÒªÉí·ÝÈÏÖ¤(HTTP·½Ê½Ê±)
		'proxyAuth' => false,
		//ÈÏÖ¤µÄ·½Ê½.¿ÉÑ¡Ôñ BASIC »ò NTLM ·½Ê½
		'proxyAuthType' => 'BASIC',
		//ÈÏÖ¤µÄÓÃ»§ÃûºÍÃÜÂë
		'proxyAuthUser' => 'user',
		'proxyAuthPwd' => 'password',
	);

	/**
	 * ¹¹Ôìº¯Êý
	 *
	 * @param array $setopt :Çë²Î¿¼ private $setopt À´ÉèÖÃ
	 */
	public function __construct($setopt = array()) {
		//ºÏ²¢ÓÃ»§µÄÉèÖÃºÍÏµÍ³µÄÄ¬ÈÏÉèÖÃ
		$this->setopt = array_merge($this->setopt, $setopt);
		//Èç¹ûÃ»ÓÐ°²×°CURLÔòÖÕÖ¹³ÌÐò
		function_exists('curl_init') || die('CURL Library Not Loaded');
		//³õÊ¼»¯
		$this->ch = curl_init();
		//ÉèÖÃCURLÁ¬½ÓµÄ¶Ë¿Ú
		curl_setopt($this->ch, CURLOPT_PORT, $this->setopt['port']);
		//Ê¹ÓÃ´úÀí
		if ($this->setopt['proxy']) {
			$proxyType = $this->setopt['proxyType'] == 'HTTP' ? CURLPROXY_HTTP : CURLPROXY_SOCKS5;
			curl_setopt($this->ch, CURLOPT_PROXYTYPE, $proxyType);
			curl_setopt($this->ch, CURLOPT_PROXY, $this->setopt['proxyHost']);
			curl_setopt($this->ch, CURLOPT_PROXYPORT, $this->setopt['proxyPort']);
			//´úÀíÒªÈÏÖ¤
			if ($this->setopt['proxyAuth']) {
				$proxyAuthType = $this->setopt['proxyAuthType'] == 'BASIC' ? CURLAUTH_BASIC : CURLAUTH_NTLM;
				curl_setopt($this->ch, CURLOPT_PROXYAUTH, $proxyAuthType);
				$user = "[{$this->setopt['proxyAuthUser']}]:[{$this->setopt['proxyAuthPwd']}]";
				curl_setopt($this->ch, CURLOPT_PROXYUSERPWD, $user);
			}
		}
		if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off'))
		//ÆôÓÃÊ±»á½«·þÎñÆ÷·þÎñÆ÷·µ»ØµÄ¡°Location:¡±·ÅÔÚheaderÖÐµÝ¹éµÄ·µ»Ø¸ø·þÎñÆ÷
		{
			curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
		}

		//´ò¿ªµÄÖ§³ÖSSL
		if ($this->setopt['ssl']) {
			//²»¶ÔÈÏÖ¤Ö¤ÊéÀ´Ô´µÄ¼ì²é
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			//´ÓÖ¤ÊéÖÐ¼ì²éSSL¼ÓÃÜËã·¨ÊÇ·ñ´æÔÚ
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		//ÉèÖÃhttpÍ·,Ö§³Ölighttpd·þÎñÆ÷µÄ·ÃÎÊ
		$header[] = 'Expect:';
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
		//ÉèÖÃ HTTP USERAGENT
		$userAgent = $this->setopt['userAgent'] ? $this->setopt['userAgent'] : $_SERVER['HTTP_USER_AGENT'];
		curl_setopt($this->ch, CURLOPT_USERAGENT, $userAgent);
		//ÉèÖÃÁ¬½ÓµÈ´ýÊ±¼ä,0²»µÈ´ý
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->setopt['timeOut']);
		//ÉèÖÃcurlÔÊÐíÖ´ÐÐµÄ×î³¤ÃëÊý
		curl_setopt($this->ch, CURLOPT_TIMEOUT, $this->setopt['timeOut']);
		//ÉèÖÃ¿Í»§¶ËÊÇ·ñÖ§³Ö gzipÑ¹Ëõ
		if ($this->setopt['gzip']) {
			curl_setopt($this->ch, CURLOPT_ENCODING, 'gzip');
		}
		//ÊÇ·ñÊ¹ÓÃµ½COOKIE
		if ($this->setopt['useCookie']) {
			//Éú³É´æ·ÅÁÙÊ±COOKIEµÄÎÄ¼þ(Òª¾ø¶ÔÂ·¾¶)
			$cookfile = tempnam(sys_get_temp_dir(), 'cuk');
			//Á¬½Ó¹Ø±ÕÒÔºó£¬´æ·ÅcookieÐÅÏ¢
			curl_setopt($this->ch, CURLOPT_COOKIEJAR, $cookfile);
			curl_setopt($this->ch, CURLOPT_COOKIEFILE, $cookfile);
		}
		//ÊÇ·ñ½«Í·ÎÄ¼þµÄÐÅÏ¢×÷ÎªÊý¾ÝÁ÷Êä³ö(HEADERÐÅÏ¢),ÕâÀï±£Áô±¨ÎÄ
		curl_setopt($this->ch, CURLOPT_HEADER, true);
		//»ñÈ¡µÄÐÅÏ¢ÒÔÎÄ¼þÁ÷µÄÐÎÊ½·µ»Ø£¬¶ø²»ÊÇÖ±½ÓÊä³ö¡£
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_BINARYTRANSFER, true);
	}

	/**
	 * ÒÔ GET ·½Ê½Ö´ÐÐÇëÇó
	 *
	 * @param string $url :ÇëÇóµÄURL
	 * @param array $params £ºÇëÇóµÄ²ÎÊý,¸ñÊ½Èç: array('id'=>10,'name'=>'yuanwei')
	 * @param array $referer :ÒýÓÃÒ³Ãæ,Îª¿ÕÊ±×Ô¶¯ÉèÖÃ,Èç¹û·þÎñÆ÷ÓÐ¶ÔÕâ¸ö¿ØÖÆµÄ»°ÔòÒ»¶¨ÒªÉèÖÃµÄ.
	 * @return ´íÎó·µ»Ø:false ÕýÈ··µ»Ø:½á¹ûÄÚÈÝ
	 */
	public function get($url, $params = array(), $referer = '') {
		return $this->_request('GET', $url, $params, array(), $referer);
	}

	/**
	 * ÒÔ POST ·½Ê½Ö´ÐÐÇëÇó
	 *
	 * @param string $url :ÇëÇóµÄURL
	 * @param array $params £ºÇëÇóµÄ²ÎÊý,¸ñÊ½Èç: array('id'=>10,'name'=>'yuanwei')
	 * @param array $uploadFile :ÉÏ´«µÄÎÄ¼þ,Ö§³ÖÏà¶ÔÂ·¾¶,¸ñÊ½ÈçÏÂ
	 * µ¥¸öÎÄ¼þÉÏ´«:array('img1'=>'./file/a.jpg')
	 * Í¬×Ö¶Î¶à¸öÎÄ¼þÉÏ´«:array('img'=>array('./file/a.jpg','./file/b.jpg'))
	 * @param array $referer :ÒýÓÃÒ³Ãæ,ÒýÓÃÒ³Ãæ,Îª¿ÕÊ±×Ô¶¯ÉèÖÃ,Èç¹û·þÎñÆ÷ÓÐ¶ÔÕâ¸ö¿ØÖÆµÄ»°ÔòÒ»¶¨ÒªÉèÖÃµÄ.
	 * @return ´íÎó·µ»Ø:false ÕýÈ··µ»Ø:½á¹ûÄÚÈÝ
	 */
	public function post($url, $params = array(), $uploadFile = array(), $referer = '') {
		return $this->_request('POST', $url, $params, $uploadFile, $referer);
	}

	/**
	 * µÃµ½´íÎóÐÅÏ¢
	 *
	 * @return string
	 */
	public function error() {
		return curl_error($this->ch);
	}

	/**
	 * µÃµ½´íÎó´úÂë
	 *
	 * @return int
	 */
	public function errno() {
		return curl_errno($this->ch);
	}

	/**
	 * µÃµ½·¢ËÍÇëÇóÇ°ºÍÇëÇóºóËùÓÐµÄ·þÎñÆ÷ÐÅÏ¢ºÍ·þÎñÆ÷HeaderÐÅÏ¢,ÆäÖÐ
	 * [before] £ºÇëÇóÇ°ËùÉèÖÃµÄÐÅÏ¢
	 * [after] :ÇëÇóºóËùÓÐµÄ·þÎñÆ÷ÐÅÏ¢
	 * [header] :·þÎñÆ÷Header±¨ÎÄÐÅÏ¢
	 *
	 * @return array
	 */
	public function getInfo() {
		return $this->info;
	}

	/**
	 * Îö¹¹º¯Êý
	 *
	 */
	public function __destruct() {
		//¹Ø±ÕCURL
		curl_close($this->ch);
	}

	/**
	 * Ë½ÓÐ·½·¨:Ö´ÐÐ×îÖÕÇëÇó
	 *
	 * @param string $method :HTTPÇëÇó·½Ê½
	 * @param string $url :ÇëÇóµÄURL
	 * @param array $params £ºÇëÇóµÄ²ÎÊý
	 * @param array $uploadFile :ÉÏ´«µÄÎÄ¼þ(Ö»ÓÐPOSTÊ±²ÅÉúÐ§)
	 * @param array $referer :ÒýÓÃÒ³Ãæ
	 * @return ´íÎó·µ»Ø:false ÕýÈ··µ»Ø:½á¹ûÄÚÈÝ
	 */
	private function _request($method, $url, $params = array(), $uploadFile = array(), $referer = '') {
		//Èç¹ûÊÇÒÔGET·½Ê½ÇëÇóÔòÒªÁ¬½Óµ½URLºóÃæ
		if ($method == 'GET') {
			$url = $this->_parseUrl($url, $params);
		}
		//ÉèÖÃÇëÇóµÄURL
		curl_setopt($this->ch, CURLOPT_URL, $url);
		//Èç¹ûÊÇPOST
		if ($method == 'POST') {
			//·¢ËÍÒ»¸ö³£¹æµÄPOSTÇëÇó£¬ÀàÐÍÎª£ºapplication/x-www-form-urlencoded
			curl_setopt($this->ch, CURLOPT_POST, true);
			//ÉèÖÃPOST×Ö¶ÎÖµ
			$postData = $this->_parsmEncode($params, false);
			/*
			//Èç¹ûÓÐÉÏ´«ÎÄ¼þ
			if($uploadFile){
			foreach($uploadFile as $key=>$file){
			if(is_array($file)){
			$n = 0;
			foreach($file as $f){
			//ÎÄ¼þ±ØÐèÊÇ¾ø¶ÔÂ·¾¶
			$postData[$key.'['.$n++.']'] = '@'.realpath($f);
			}
			}else{
			$postData[$key] = '@'.realpath($file);
			}
			}
			}
			 */
			//pr($postData); die;
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $postData);
		}
		//ÉèÖÃÁËÒýÓÃÒ³,·ñÔò×Ô¶¯ÉèÖÃ
		if ($referer) {
			curl_setopt($this->ch, CURLOPT_REFERER, $referer);
		} else {
			curl_setopt($this->ch, CURLOPT_AUTOREFERER, true);
		}
		//µÃµ½ËùÓÐÉèÖÃµÄÐÅÏ¢
		$this->info['before'] = curl_getinfo($this->ch);
		//¿ªÊ¼Ö´ÐÐÇëÇó
		$result = curl_exec($this->ch);
		//µÃµ½±¨ÎÄÍ·
		$headerSize = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
		$this->info['header'] = substr($result, 0, $headerSize);
		//È¥µô±¨ÎÄÍ·
		$result = substr($result, $headerSize);
		//µÃµ½ËùÓÐ°üÀ¨·þÎñÆ÷·µ»ØµÄÐÅÏ¢
		$this->info['after'] = curl_getinfo($this->ch);
		//Èç¹ûÇëÇó³É¹¦
		if ($this->errno() == 0) {
			//&& $this->info['after']['http_code'] == 200
			return $result;
		} else {
			return false;
		}

	}

	/**
	 * ·µ»Ø½âÎöºóµÄURL£¬GET·½Ê½Ê±»áÓÃµ½
	 *
	 * @param string $url :URL
	 * @param array $params :¼ÓÔÚURLºóµÄ²ÎÊý
	 * @return string
	 */
	private function _parseUrl($url, $params) {
		$fieldStr = $this->_parsmEncode($params);
		if ($fieldStr) {
			$url .= strstr($url, '?') === false ? '?' : '&';
			$url .= $fieldStr;
		}
		return $url;
	}

	/**
	 * ¶Ô²ÎÊý½øÐÐENCODE±àÂë
	 *
	 * @param array $params :²ÎÊý
	 * @param bool $isRetStr : true£ºÒÔ×Ö·û´®·µ»Ø false:ÒÔÊý×é·µ»Ø
	 * @return string || array
	 */
	private function _parsmEncode($params, $isRetStr = true) {
		$fieldStr = '';
		$spr = '';
		$result = array();
		foreach ($params as $key => $value) {
			$value = urlencode($value);
			$fieldStr .= $spr . $key . '=' . $value;
			$spr = '&';
			$result[$key] = $value;
		}
		return $isRetStr ? $fieldStr : $result;
	}
}
