<?php 

	namespace Test\Metrc\Sales;

	class Sales_Test extends \Test\Metrc_Test {

		protected $metrc_urls = array(
			['action' => 'GET', 'url' => 'sales/v1/customertypes'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries/active'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries/inactive'],
			['action' => 'GET', 'url' => 'sales/v1/deliveries'],
			['action' => 'POST', 'url' => 'sales/v1/deliveries'],
			['action' => 'PUT', 'url' => 'sales/v1/deliveries'],
			['action' => 'DELETE', 'url' => 'sales/v1/deliveries'],
			['action' => 'GET', 'url' => 'sales/v1/delivery/returnreasons'],
			['action' => 'PUT', 'url' => 'sales/v1/deliveries/complete'],
			['action' => 'GET', 'url' => 'sales/v1/receipts'],
			['action' => 'POST', 'url' => 'sales/v1/receipts'],
			['action' => 'PUT', 'url' => 'sales/v1/receipts'],
			['action' => 'DELETE', 'url' => 'sales/v1/receipts'],
			['action' => 'GET', 'url' => 'sales/v1/receipts/active'],
			['action' => 'GET', 'url' => 'sales/v1/receipts/inactive'],
			['action' => 'POST', 'url' => 'sales/v1/transactions'],
			['action' => 'PUT', 'url' => 'sales/v1/transactions'],
			['action' => 'DELETE', 'url' => 'sales/v1/transactions'],
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