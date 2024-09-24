<?php
/**
 * Test Helper for BioTrack
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Base extends \OpenTHC\Bunk\Test\Base
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
		$url_base = rtrim(getenv('OPENTHC_TEST_ORIGIN'), '/');
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

	function assertValidResponse($res, $code_expect=200, $type_expect=null, $dump=null) {

		$ret = parent::assertValidResponse($res, $code_expect, $type_expect, $dump);
		$this->assertIsArray($ret);
		$this->assertArrayHasKey('success', $ret);

		return $ret;

	}

}
