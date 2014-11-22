<?php
class TieTuKuToken{
	public $accesskey;
	public $secretkey;
	private $base64param;
	function __construct($accesskey,$secretkey){
		if($accesskey == ''||$secretkey =='')
			return false;
		$this->accesskey = $accesskey;
		$this->secretkey = $secretkey;
	}
	function dealParam($param){
		$this->base64param = $this->URLSafeBase64Encode(json_encode($param));
		return $this;
	}
	function createToken(){
		if(empty($this->base64param)) return false;
		$sign = $this->signEncode($this->base64param,$this->secretkey);
		return $this->accesskey.':'.$this->URLSafeBase64Encode($sign).':'.$this->base64param;
	}
	function signEncode($str, $key){
		$hmac_sha1_str = "";
		if (function_exists('hash_hmac')){
			$hmac_sha1_str = hash_hmac("sha1", $str, $key, true);
		} else {
			$blocksize = 64;
			$hashfunc  = 'sha1';
			if (strlen($key) > $blocksize){
				$key = pack('H*', $hashfunc($key));
			}
			$key       		= str_pad($key, $blocksize, chr(0x00));
			$ipad      		= str_repeat(chr(0x36), $blocksize);
			$opad      		= str_repeat(chr(0x5c), $blocksize);
			$hmac_sha1_str	= pack('H*', $hashfunc(($key ^ $opad) . pack('H*', $hashfunc(($key ^ $ipad) . $str))));
		}
		return $hmac_sha1_str;
	}
	function URLSafeBase64Encode($str){
		$find = array('+', '/');
		$replace = array('-', '_');
		return str_replace($find, $replace, base64_encode($str));
	}
}
class TTKClient{
	public $upload_host = "http://up.tietuku.com/";
	public $timeout = 60;
	public $CURLtimeout = 30;
	function __construct($accesskey,$secretkey){
		$this->op_Token=new TieTuKuToken($accesskey,$secretkey);
	}
	function uploadFile($aid,$file=null){
		$url = $this->upload_host;
		$param['deadline'] = time()+$this->timeout;
		$param['album'] = $aid;
		$Token=$this->op_Token->dealParam($param)->createToken();
		$data['Token']=$Token;
		$data['file']='@'.$file;
		return empty($file)?$Token:$this->post($url,$data);
	}
	function post($url,$post_data){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,$this->CURLtimeout);  
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}
}