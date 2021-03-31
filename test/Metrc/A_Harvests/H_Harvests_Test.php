<?php 

namespace Test\Metrc\A_Harvests;

class H_Harvest_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/active';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_valid_response() {
		foreach ($this->metrc_urls as $url) {
			$res = $this->ghc->request($url['action'], $url['url']);

			if ($url['action'] == "GET") {
				$this->assertValidResponses($res, $url['url'], $url['action']);
			} else {
				$this->assertValidDelete($res, $url['url']);
			}
		}
	}
}