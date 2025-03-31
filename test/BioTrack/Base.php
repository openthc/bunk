<?php
/**
 * Test Helper for BioTrack
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Base extends \OpenTHC\Bunk\Test\Base
{
	protected $cre;

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
		$url_base = rtrim($_ENV['OPENTHC_TEST_ORIGIN'], '/');
		$url = sprintf('%s/biotrack/v2014/serverjson.asp', $url_base);

		// $this->ghc = $this->_api($url);
		// $this->ghc = null;

		$cfg = [];
		$cfg['id'] = 'openthc/bunk/test';
		$cfg['name'] = 'openthc/bunk/test';
		$cfg['server'] = $url;
		$cfg['session'] = $this->_sid;
		$this->cre = new \OpenTHC\CRE\BioTrack($cfg);
		$this->cre->setLicense([
			'id' => 'TEST',
			'code' => 'TEST',
			'guid' => 'TEST',
			'name' => 'TEST',
		]);

	}

	function auth($t)
	{
		$res = $this->cre->auth($_ENV[sprintf('biotrack-company-%s', $t)], $_ENV['biotrack-username'], $_ENV['biotrack-password']);
		$this->assertIsArray($res);
		$this->assertEquals(1, $res['success']);
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

		// $res = parent::assertValidResponse($res, $code_expect, $type_expect, $dump);
		$this->assertIsArray($res);

		// our API Style Response
		$key_list = array_keys($res);
		if (in_array('code', $key_list) && in_array('data', $key_list) && in_array('meta', $key_list)) {

			$code_actual = $res['code'];
			switch ($code_actual) {
			case 200:
				$this->assertEquals(1, $res['data']['success']);
				break;
			case 400:
			case 403:
				$this->assertEquals(0, $res['data']['success']);
				break;
			}

			return $res['data'];

		}

		$this->assertArrayHasKey('success', $res);
		switch ($code_expect) {
		case 200:
			$this->assertEquals(1, $res['success']);
			break;
		case 400:
		case 403:
			$this->assertEquals(0, $res['success']);
			break;
		}

		return $res;

	}

}
