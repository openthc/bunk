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

	protected function _api($opt=null) : object
	{
		$base = rtrim(getenv('OPENTHC_TEST_ORIGIN'), '/');

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
