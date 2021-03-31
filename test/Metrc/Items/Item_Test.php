<?php 

	namespace Test\Metrc\Items;

	class Item_Test extends \Test\Metrc_Test {

		protected $metrc_urls = array(
			['action' => 'GET', 'url' => 'items/v1/active'],
			['action' => 'GET', 'url' => 'items/v1/categories'],
			['action' => 'GET', 'url' => 'items/v1/brands'],
			['action' => 'POST', 'url' => 'items/v1/create'],
			['action' => 'GET', 'url' => 'items/v1/3'],
			['action' => 'DELETE', 'url' => 'items/v1/1'],
			['action' => 'POST', 'url' => 'items/v1/update'],
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