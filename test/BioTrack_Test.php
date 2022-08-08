<?php
/**
 * Test Helper for BioTrack
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test;

class BioTrack_Test extends \OpenTHC\Bunk\Test\Base_Case
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
		$url_base = rtrim(getenv('OPENTHC_TEST_BASE'), '/');
		$url = sprintf('%s/biotrack/v2013/serverjson.asp', $url_base);
		$this->ghc = $this->_api($url);
	}

	function auth($t)
	{
		// Good Login
		$arg = [
			'action' => 'login',
			'license_number' => $_ENV[sprintf('biotrack-company-%s', $t)],
			'username' => $_ENV['biotrack-username'],
			'password' => $_ENV['biotrack-password'],
		];

		$res = $this->post_json('', $arg);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// var_dump($res);
		$this->_sid = $res['sessionid'];
	}

	/**
	 * Always sets this parameter
	 */
	protected function post_json($url, $arg)
	{
		$arg['API'] = '4.0';
		return parent::post_json($url, $arg);
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
		$res_code = $res->getStatusCode();
		switch ($res_code) {
		case 422:
		case 500:
			if (empty($dump)) {
				$dump = sprintf('%d Response Code', $res_code);
			}
			break;
		}

		if ($res_code != $code) {
			$dump = sprintf('%d Response Code', $res_code);
		}

		$this->raw = $res->getBody()->getContents();

		$res_type = $res->getHeaderLine('content-type');
		if ('application/json' != $res_type) {
			$dump = 'MIME-TYPE';
		}

		if (!empty($dump)) {
			echo "\n<<<$dump<<<\n{$this->raw}\n###\n";
		}

		$ret = \json_decode($this->raw, true);

		//$this->assertEquals('HTTPS', $res->getProtocol());
		$this->assertEquals($code, $res->getStatusCode());
		$this->assertEquals('application/json', $res_type); // RFCs
		// $this->assertEquals('text/json; charset=UTF-8', $res->getHeaderLine('content-type'));
		$this->assertIsArray($ret);
		$this->assertArrayHasKey('success', $ret);

		return $ret;

	}

}
