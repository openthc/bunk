<?php
/**
 * Test Helper for METRC
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test;

class Metrc_Test extends \OpenTHC\Bunk\Test\Base_Case
{

	public $ghc;

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	function assertValidResponse($res, $code=200, $dump=null) {
		$code = $res->getStatusCode();

		if (!empty($dump)) {
			$raw = $res->getBody()->getContents();
			echo "\n<<<$dump<<<\n{$raw}\n###\n";
		}

		$this->assertEquals(200, $code);
	}

	protected function _api($opt=null) : object
	{
		$base = rtrim(getenv('OPENTHC_TEST_BASE'), '/');

		// create our http client (Guzzle)
		$cfg = [
			'base_uri' => sprintf('%s/metrc/v2015/', $base),
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

		$c = new \GuzzleHttp\Client($cfg);

		return $c;
	}
}
