<?php
/**
 * Test Helper for LeafData
 */

namespace OpenTHC\Bunk\Test;

class LeafData_Test extends \OpenTHC\Bunk\Test\Base_Case
{
	public $ghc;

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

		//$this->assertEquals('HTTPS', $res->getProtocol());
		$this->assertEquals($code, $res->getStatusCode());
		// $this->assertEquals('application/json', $res->getHeaderLine('content-type')); // RFCs
		// $this->assertEquals('text/json; charset=UTF-8', $res->getHeaderLine('content-type')); // LeafData
		$ret = \json_decode($this->raw, true);
		$this->assertIsArray($ret);

		// $this->assertCount(9, $ret);

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
	function find_random_lot($f=null)
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

	function find_random_strain()
	{
		$res = $this->get('strains');
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

	/**
	 * @param $b The Base URL
	 */
	protected function _api($opt=null)
	{
		// create our http client (Guzzle)
		$cfg = array(
			'base_uri' => sprintf('https://%s/leafdata/', getenv('OPENTHC_BUNK_HOST')),
			'headers' => [
				'x-mjf-mme-code' => null,
				'x-mjf-key' => null,
			],
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,
			'verify' => false,
		);

		if (!empty($opt['license'])) {
			$cfg['headers']['x-mjf-mme-code'] = $opt['license'];
			$cfg['headers']['x-mjf-key'] = $opt['license-key'];
		}

		$c = new \GuzzleHttp\Client($cfg);

		return $c;
	}

}
