<?php 
namespace App\Traits;

trait JSONResponses {

	public static $STATUS_OK = 200;
	public static $STATUS_ERROR = 400;
	public static $STATUS_UNAUTHORIZED = 401;
	public static $STATUS_FORBIDDEN = 403;

	/**
	 * BASIC RESPONSE
	 * 
	 * @param integer $status HTTP STATUS CODE
	 * @param array $data response data
	 * 
	 * @return json
	 */
	protected function response($status, $data) {
		return response()->json($data, $status);
	}

	/**
	 * SUCCESS RESPONSE (200)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Success!')
	 * 
	 * @return json
	 */
	protected function responseSuccess($data= [], $message= 'Success!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_OK, $data);
	}

	/**
	 * ERROR RESPONSE (400)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Error!')
	 * 
	 * @return json
	 */
	protected function responseError($data= [], $message= 'Error!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_ERROR, $data);
	}

	/**
	 * UNAUTHORIZED RESPONSE (401)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Unauthorized!')
	 * 
	 * @return json
	 */
	protected function responseUnauthorized($data= [], $message= 'Unauthorized!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_UNAUTHORIZED, $data);
	}

	/**
	 * FORBIDDEN RESPONSE (403)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Forbidden!')
	 * 
	 * @return json
	 */
	protected function responseForbidden($data= [], $message= 'Forbidden!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_FORBIDDEN, $data);
	}

}