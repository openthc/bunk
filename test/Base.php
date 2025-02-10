<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test;

class Base extends \OpenTHC\Test\Base
{
	protected $ghc; // API Guzzle HTTP Client
	protected $raw; // Raw Response Buffer

	protected $_pid;
	protected $_tmp_file = '/tmp/bunk-test-case.dat';

	// Development helper
	// @see https://github.com/namshi/cuzzle/blob/master/example/app.php
	public $testHandler;

	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
		$this->_pid = getmypid();
	}

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	/**
	*/
	protected function _api($url)
	{

		$logger = new \Monolog\Logger('guzzle.to.curl');
		$this->testHandler = new \Monolog\Handler\TestHandler();
		$logger->pushHandler($this->testHandler);

		// Had to drop because of Guzzle update
		// $handler = \GuzzleHttp\HandlerStack::create();
		// $handler->after('cookies', new \Namshi\Cuzzle\Middleware\CurlFormatterMiddleware($logger));

		// create our http client (Guzzle)
		$c = new \GuzzleHttp\Client(array(
			'base_uri' => $url,
			'allow_redirects' => false,
			'debug' => $_ENV['OPENTHC_TEST_HTTP_DEBUG'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,
			'handler' => $handler,
		));

		return $c;
	}

	/**
		HTTP Utility
	*/
	function get($url)
	{
		$res = $this->ghc->get($url);
		$ret = $this->assertValidResponse($res, 200); // , "GET FAILED to $url");
		return $ret;
	}

	/**
	*/
	protected function post_form($u, $a)
	{
		$res = $this->ghc->post($u, [ 'form_params' => $a ]);
		return $res;
	}

	/**
	*/
	protected function post_json($u, $a)
	{
		$res = $this->ghc->post($u, [ 'json' => $a ]);
		return $res;
	}


	/**
	*/
	protected function _data_stash_get()
	{
		if (is_file($this->_tmp_file)) {
			$x = file_get_contents($this->_tmp_file);
			$x = json_decode($x, true);
			return $x;
		}
	}


	/**
	*/
	protected function _data_stash_put($d)
	{
		file_put_contents($this->_tmp_file, json_encode($d));
	}

}
