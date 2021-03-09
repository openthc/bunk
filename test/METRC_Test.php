<?php
/**
 * Test Helper for METRC
 */

namespace Test;

class METRC_Test extends OpenTHC_Base_TestCase
{

	public $ghc;

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	function assertValidResponse($res, $code=200, $dump=null) {
		
	}

	protected function _api($opt=null)
	{
		// create our http client (Guzzle)
		$cfg =[
			'base_uri' => sprintf('https://%s/metrc/', getenv('api-uri')),
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
			'base_uri' => sprintf('https://%s/metrc/', getenv('api-uri')),
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