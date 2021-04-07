<?php
/**
 * Test Helper for METRC
 */

namespace Test;

class Metrc_Test extends \Test\Base_Test
{

	public $ghc;

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	function assertValidResponse($res, $code=200, $dump=null) {
		$code = $res->getStatusCode();
		$raw = $res->getBody()->getContents();

		if (!empty($dump)) {
			echo "\n<<<$dump<<<\n{$this->raw}\n###\n";
		}

		$this->assertEquals(200, $code);
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
