<?php
/**
 * Test Bootstrap
 */

// namespace Test;

// Load App bootstrap file
require_once(dirname(dirname(__FILE__)) . '/boot.php');


class OpenTHC_Base_TestCase extends \PHPUnit\Framework\TestCase
{
	protected $ghc; // API Guzzle HTTP Client
	protected $raw; // Raw Response Buffer

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
		$ret = $this->assertValidResponse($res, 200); // , "GET FAILED to $url");
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

}

/**
 * Test Helper for LeafData
 */
class OpenTHC_Bunk_LeafData_Test extends OpenTHC_Base_TestCase
{
	/**
	* Intends to become an assert wrapper for a bunch of common response checks
	* @param $res, Response Object
	* @return void
	*/
	function assertValidResponse($res, $code=200, $dump=null)
	{
		$this->assertNotEmpty($res);

		// Dump on Errors
		$hrc = $res->getStatusCode();
		switch ($hrc) {
		case 422:
		case 500:
			if (empty($dump)) {
				$dump = sprintf('%d Response Code', $hrc);
			}
			break;
		}

		$this->raw = $res->getBody()->getContents();

		if (!empty($dump)) {
			echo "\n<<<$dump<<<\n{$this->raw}\n###\n";
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

	function find_random_batch_of_type($t)
	{
		$res = $this->ghc->get('batches?f_type=' .$t);
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['data']);
		$this->assertGreaterThan(2, $res['data']);

		$rnd_list = [];
		foreach ($res['data'] as $b) {
			if ('open' == $b['status']) {
				$rnd_list[] = $b;
			}
		}

		$i = array_rand($rnd_list);
		$B = $rnd_list[$i];

		return $B;

	}

	/**
	 *
	 * @param [type] $f [description]
	 * @return [type] [description]
	 */
	function find_random_lot($f)
	{
		// @todo Handle Multiple Pages?
		$res = $this->get('inventories');
		$this->assertCount(9, $res);
		$this->assertIsArray($res['data']);

		$rnd_list = [];
		foreach ($res['data'] as $x) {
			$rnd_list[] = $x;
		}

		$i = array_rand($rnd_list);
		$r = $rnd_list[$i];

		return $r;

	}


	function find_random_plant($f=null)
	{
		$res = $this->get('plants?f_stage=growing');
		$this->assertCount(9, $res);
		$this->assertIsArray($res['data']);

		// echo "\nWe Found: " . count($res['data']) . " Plants\n";
		// var_dump($res['next_page_url']);

		$rnd_list = [];
		foreach ($res['data'] as $x) {
			if ('growing' == $x['stage']) {
				$rnd_list[] = $x;
			}
		}

		$i = array_rand($rnd_list);
		$r = $rnd_list[$i];

		return $r;

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
