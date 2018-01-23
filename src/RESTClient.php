<?php 

namespace RifkyEkayama\RajaOngkir;

/**
 * RajaOngkir REST Client
 *
 * @author Damar Riyadi <damar@tahutek.net>
 */
class RESTClient {

	private $endpoint;
	private $account_type;
	private $api_key;
	private $api_url;

	public function __construct($api_key, $endpoint, $account_type) {
		$this->api_key = $api_key;
		$this->endpoint = $endpoint;
		$this->account_type = $account_type;
		if($account_type == "starter"){
			$this->api_url = "https://api.rajaongkir.com/starter";
		}else if($account_type == "basic"){
			$this->api_url = "https://api.rajaongkir.com/basic";
		}else if($account_type == "pro"){
			$this->api_url = "https://pro.rajaongkir.com/api";
		}
	}

	/**
	 * HTTP POST method
	 *
	 * @param array Parameter yang dikirimkan
	 * @return string Response dari cURL
	 */
	public function post($params) {
		$curl = curl_init();
		$header[] = "Content-Type: application/x-www-form-urlencoded";
		$header[] = "key: $this->api_key";
		$query = http_build_query($params);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint);
		curl_setopt($curl, CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		$request = curl_exec($curl);
		$return = ($request === FALSE) ? curl_error($curl) : $request;
		curl_close($curl);
		return $return;
	}

	/**
	 * HTTP GET method
	 *
	 * @param array Parameter yang dikirimkan
	 * @return string Response dari cURL
	 */
	public function get($params) {
		$curl = curl_init();
		$header[] = "key: $this->api_key";
		$query = http_build_query($params);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint . "?" . $query);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$request = curl_exec($curl);
		$return = ($request === FALSE) ? curl_error($curl) : $request;
		curl_close($curl);
		return $return;
	}

}