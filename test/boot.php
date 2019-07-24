<?php
/**
 * Test Bootstrap
 */

// Load App bootstrap file
require_once(dirname(dirname(__FILE__)) . '/boot.php');


class OpenTHC_Bunk_LeafData_Test extends \PHPUnit\Framework\TestCase  //  \App\Test\Components\OpenTHC_Test_Case
{
	protected $ghc; // API Guzzle HTTP Client
	protected $raw; // Raw Response Buffer

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	/**
	* Intends to become an assert wrapper for a bunch of common response checks
	* @param $res, Response Object
	* @return void
	*/
	function assertValidResponse($res, $code=200, $barf=null)
	{
		$this->raw = $res->getBody()->getContents();
		if (!empty($barf)) {
			echo "\n<<<$barf<<<\n{$this->raw}\n###\n";
		}

		$ret = \json_decode($this->raw, true);

		//$this->assertEquals('HTTPS', $res->getProtocol());
		$this->assertEquals($code, $res->getStatusCode());
		// $this->assertEquals('application/json', $res->getHeaderLine('content-type')); // RFCs
		$this->assertEquals('text/json; charset=UTF-8', $res->getHeaderLine('content-type')); // LeafData
		$this->assertIsArray($ret);
		// $this->assertCount(2, $ret);

		// $this->assertIsArray($x['data']);
		// $this->assertIsArray($x['meta']);

		return $ret;

	}

	function _data_stash_get()
	{
		if (is_file($f)) {
			if (is_readable($f)) {
				$x = file_get_contents($f);
				$x = json_decode($x, true);
				return $x;
			}
		}

		return null;

	}

	function _data_stash_put($f, $d)
	{
		if (!is_string($d)) {
			$d = json_encode($d);
		}

		return file_put_contents($f, $d);
	}


	/**
		HTTP Utility
	*/
	function get($url)
	{
		$res = $this->ghc->get($url);
		$ret = $this->assertValidResponse($res, 200);
		return $ret;
	}

	/**
		HTTP Utility
	*/
	function post($url, $arg)
	{
		$res = $this->ghc->post($url, array('json' => $arg));
		return $res;
	}

	/**
		@param $b The Base URL
	*/
	protected function _api($opt=null)
	{
		// create our http client (Guzzle)
		$cfg = array(
			'base_uri' => $_ENV['leafdata-uri'],
			'headers' => [
				// Setting here doesn't work @see https://github.com/guzzle/guzzle/issues/1678#issuecomment-281921604
				// 'host' => 'watest.leafdatazone.com',
				'x-mjf-mme-code' => $_ENV['leafdata-license'],
				'x-mjf-key' => $_ENV['leafdata-license-secret'],
			],
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,
		);

		if (!empty($opt['license'])) {
			$cfg['headers']['x-mjf-mme-code'] = $opt['license'];
			$cfg['headers']['x-mjf-key'] = $opt['license-secret'];
		}

		// Override Host Header Here
		// $ghhs = \GuzzleHttp\HandlerStack::create();
		// $ghhs->push(\GuzzleHttp\Middleware::mapRequest(function (\Psr\Http\Message\RequestInterface $R) {
		// 	return $R->withHeader('host', 'watest.leafdatazone.com');
		// }));
		// $cfg['handler'] = $ghhs;

		$c = new \GuzzleHttp\Client($cfg);

		return $c;
	}

}
