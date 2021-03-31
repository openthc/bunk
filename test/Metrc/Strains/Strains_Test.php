<?php 

	namespace Test\Metrc\Strains;

	class Strains_Test extends \Test\Metrc_Test {

		protected $metrc_urls = array(
			['action' => 'GET', 'url' => 'strains/v1'],
			['action' => 'DELETE', 'url' => 'strains/v1'],
			['action' => 'POST', 'url' => 'strains/v1/update'],
			['action' => 'GET', 'url' => 'strains/v1/active'],
			['action' => 'POST', 'url' => 'strains/v1/create'],
		);

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