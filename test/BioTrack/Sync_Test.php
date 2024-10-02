<?php
/**
 * Test Basic Sync
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class Sync_Test extends \OpenTHC\Bunk\Test\BioTrack\Base
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_sync_check_peek()
	{
		$arg = [
			'download' => '0',
			'data' => []
		];

		foreach ($this->_sync_table_list as $t => $n) {
			$arg['data'][] = [
				'table' => $t,
				'transaction_start' => 0,
			];
		}

		$res = $this->cre->sync_check('', $arg);
		$res = $this->assertValidResponse($res, 200);
		$this->assertIsArray($res['summary']);

		$res = $res['summary'];
		$this->assertCount(19, $res);

	}


	function test_sync_check_list()
	{
		$arg = [
			'download' => '0',
			'data' => []
		];

		foreach ($this->_sync_table_list as $t => $n) {
			$arg['data'][] = [
				'table' => $t,
				'transaction_start' => 999999999999,
			];
		}

		$res = $this->cre->sync_check($arg);
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['summary']);
		$res = $res['summary'];
		$this->assertCount(19, $res);

	}


	function test_sync_fetch()
	{
		// Check if all the things exist and are correct
		$res = $this->cre->sync_employee();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['employee']);

		$res = $this->cre->sync_id_preassign();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['id_preassign']);

		$res = $this->cre->sync_inventory();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory']);

		$res = $this->cre->sync_inventory_adjust();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_adjust']);

		$res = $this->cre->sync_inventory_qa_sample();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_qa_sample']);

		$res = $this->cre->sync_inventory_room();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_room']);

		$res = $this->cre->sync_inventory_sample();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_sample']);

		$res = $this->cre->sync_inventory_transfer();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_transfer']);

		$res = $this->cre->sync_inventory_transfer_inbound();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['inventory_transfer_inbound']);

		$res = $this->cre->sync_manifest();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['manifest']);

		$res = $this->cre->sync_plant();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['plant']);

		$res = $this->cre->sync_plant_derivative();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['plant_derivative']);

		$res = $this->cre->sync_plant_room();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['plant_room']);

		$res = $this->cre->sync_qa_lab();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['qa_lab']);

		$res = $this->cre->sync_sale();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['sale']);

		$res = $this->cre->sync_tax_report();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['tax_report']);

		$res = $this->cre->sync_third_party_transporter();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['third_party_transporter']);

		$res = $this->cre->sync_vehicle();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['vehicle']);

		$res = $this->cre->sync_vendor();
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res['vendor']);

	}

}
