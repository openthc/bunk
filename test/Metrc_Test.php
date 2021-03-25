<?php
/**
 * Test Helper for METRC
 */

namespace Test;

class Metrc_TestCase extends OpenTHC_Base_TestCase
{

	public $ghc;

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	function assertValidResponses($res, $dump, $action) {
		$code = $res->getStatusCode();
		$raw = $res->getBody()->getContents();
		$this->assertNotEmpty($raw, "{$action}: {$dump} is empty");
		$this->assertEquals(200, $code, "expected 200 got {$code} by {$dump}");
	}

	protected function _api($opt=null)
	{
		// create our http client (Guzzle)
		$cfg = [
			'base_uri' => sprintf('https://%s/metrc/v2015/', getenv('api-uri')),
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
		];

		if (!empty($opt['license'])) {
			$cfg['headers']['x-mjf-mme-code'] = $opt['license'];
			$cfg['headers']['x-mjf-key'] = $opt['license-key'];
		}

		$c = new \GuzzleHttp\Client([
			'base_uri' => sprintf('https://%s/metrc/v2015/', getenv('api-uri')),
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
		]);

		return $c;
	}
}