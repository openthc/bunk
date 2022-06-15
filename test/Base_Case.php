<?php
/**
 *
 */

namespace OpenTHC\Bunk\Test;

class Base_Case extends \PHPUnit\Framework\TestCase
{
	protected $ghc; // API Guzzle HTTP Client
	protected $raw; // Raw Response Buffer

	protected $_pid;
	protected $_tmp_file = '/tmp/bunk-test-case.dat';

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
	 * Intends to become an assert wrapper for a bunch of common response checks
	 * @param $res, Response Object
	 * @return void
	 */
	function assertValidResponse($res, $code=200, $dump=null)
	{
		$this->raw = $res->getBody()->getContents();

		$hrc = $res->getStatusCode();

		if (empty($dump)) {
			if ($code != $hrc) {
				$dump = "HTTP $hrc != $code";
			}
		}

		if (!empty($dump)) {
			echo "\n<<< $dump <<< $hrc <<<\n{$this->raw}\n###\n";
		}

		$this->assertEquals($code, $res->getStatusCode());
		$type = $res->getHeaderLine('content-type');
		$type = strtok($type, ';');
		$this->assertEquals('application/json', $type);

		$ret = \json_decode($this->raw, true);

		$this->assertIsArray($ret);
		// $this->assertArrayHasKey('data', $ret);
		// $this->assertArrayHasKey('meta', $ret);

		$this->assertArrayNotHasKey('status', $ret);
		$this->assertArrayNotHasKey('result', $ret);

		return $ret;
	}

	/**
	*/
	protected function _api($url)
	{
		// create our http client (Guzzle)
		$c = new \GuzzleHttp\Client(array(
			'base_uri' => $url,
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,
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
