<?php
/**
 * Test Bootstrap
 */

// Load App bootstrap file
require_once(dirname(dirname(__FILE__)) . '/boot.php');

/*
 * Test Data utility for data-passing
 */
function _td_read($f)
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

function _td_save($f, $d)
{
	if (!is_string($d)) {
		$d = json_encode($d);
	}

	return file_put_contents($f, $d);
}



class OpenTHC_Bunk_LeafData_Test extends \PHPUnit\Framework\TestCase  //  \App\Test\Components\OpenTHC_Test_Case
{
	protected $ghc; // API Guzzle HTTP Client

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	/**
		HTTP Utility
	*/
	function get($url)
	{
		$res = $this->ghc->get($url);

		$ret = null;
		$this->assertEquals(200, $res->getStatusCode(), 'Invalid HTTP Response');

		switch ($res->getStatusCode()) {
		case 200:
			$chk = $res->getHeaderLine('content-type');
			$chk = strtok($chk, ';');
			// $this->assertEquals('application/json', $chk, 'Invalid Content Type (known issue)');
			$this->assertEquals('text/json', $chk);

			$ret = json_decode($res->getBody(), true);
			$this->assertIsArray($ret);
			//$this->assertArrayHasKey('data', $ret);

			break;
		default:
			$ret = $res->getBody()->getContents();
		}

		return $ret;
	}

	/**
		HTTP Utility
	*/
	function post($url, $arg)
	{
		$res = $this->ghc->post($url, array('json' => $arg));

		$ret = null;
		//$this->assertEquals(200, $res->getStatusCode(), 'Invalid HTTP Response to POST');

		switch ($res->getStatusCode()) {
		case 200:

			$chk = $res->getHeaderLine('content-type');
			$chk = strtok($chk, ';');
			// $this->assertEquals('application/json', $chk, 'Invalid Content Type (known issue)');
			$this->assertEquals('text/json', $chk);

			$ret = json_decode($res->getBody(), true);
			//var_dump($ret);
			$this->assertIsArray($ret);
			// assertArrayHasKey

			break;
		default:
			$ret = $res->getBody()->getContents();
			// throw new Exception('Invalid Response from OpenTHC [LRO#103]');
		}

		return $ret;
	}

	/**
		@param $b The Base URL
	*/
	protected function _api($baseURL = null)
	{
		if (empty($baseURL)) {
			$baseURL = $_ENV['leafdata-uri'];
		}

		// create our http client (Guzzle)
		$cfg = array(
			'base_uri' => $baseURL,
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

		// Override Host Header Here
		$ghhs = \GuzzleHttp\HandlerStack::create();
		$ghhs->push(\GuzzleHttp\Middleware::mapRequest(function (\Psr\Http\Message\RequestInterface $R) use ($host) {
			return $R->withHeader('host', 'watest.leafdatazone.com');
		}));
		$cfg['handler'] = $ghhs;

		$c = new \GuzzleHttp\Client($cfg);

		return $c;
	}

}
