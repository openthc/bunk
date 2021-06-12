<?php
/**
 * Test Helper for BioTrack
 */

namespace Test;

class BioTrack_Test extends \Test\Base_Case
{
	protected $_sid;

	protected $_sync_table_list = [
		'vendor' => 'Vendor',
		'qa_lab' => 'QA Lab',
		'third_party_transporter' => 'Carrier',
		'employee' => 'Contacts',
		'vehicle' => 'Vehicle',
		'inventory_room' => 'Room/Inventory',
		'plant_room' => 'Room/Plant',
		'inventory' => 'Inventory',
		'plant' => 'Plant',
		'plant_derivative' => 'Plant Derivative',
		'manifest' => 'B2B/Outgoing',
		'inventory_transfer' => 'B2B/Outgoing/Item',
		'inventory_transfer_inbound' => 'B2B/Incoming',
		'inventory_sample' => 'Inventory Sample',
		'inventory_qa_sample' => 'QA Sample',
		'inventory_adjust' => 'Inventory Adjustment',
		'sale' => 'B2C/Sale',
		'tax_report' => 'Tax Reporting',
		'id_preassign' => 'IDs',
	];

	protected function setUp() : void
	{
		$this->ghc = $this->_api();
	}

	function auth($t)
	{
		// Good Login
		$arg = [
			'action' => 'login',
			'license_number' => $_ENV[sprintf('biotrack-company-%s', $t)],
			'username' => $_ENV[sprintf('biotrack-username-%s', $t)],
			'password' => $_ENV[sprintf('biotrack-password-%s', $t)],
		];

		$res = $this->post('', $arg);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// var_dump($res);
		$this->_sid = $res['sessionid'];
	}

	/**
		HTTP Utility
	*/
	function post($url, $arg)
	{
		$arg['API'] = '4.0';
		$arg['sessionid'] = $this->_sid;
		$arg['training'] = $_ENV['biotrack-training-mode'];
		// var_dump($arg);
		return parent::post($url, $arg);
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

		$ret = \json_decode($this->raw, true);

		//$this->assertEquals('HTTPS', $res->getProtocol());
		$this->assertEquals($code, $res->getStatusCode());
		$this->assertEquals('application/json', $res->getHeaderLine('content-type')); // RFCs
		// $this->assertEquals('text/json; charset=UTF-8', $res->getHeaderLine('content-type'));
		$this->assertIsArray($ret);
		$this->assertArrayHasKey('success', $ret);

		return $ret;

	}

	/**
		@param $b The Base URL
	*/
	protected function _api($opt=null)
	{
		// create our http client (Guzzle)
		$cfg = array(
			'base_uri' => $_ENV['biotrack-uri'],
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,
		);

		// Override Host Header Here
		// $ghhs = \GuzzleHttp\HandlerStack::create();
		// $ghhs->push(\GuzzleHttp\Middleware::mapRequest(function (\Psr\Http\Message\RequestInterface $R) {
		// 	return $R->withHeader('host', 'xx.biotrack.net');
		// }));
		// $cfg['handler'] = $ghhs;

		$c = new \GuzzleHttp\Client($cfg);

		return $c;
	}

}
