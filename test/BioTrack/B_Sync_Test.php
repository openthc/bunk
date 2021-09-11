<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class B_Sync_Test extends \Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_sync_check_peek()
	{
		$arg = [
			'action' => 'sync_check',
			'download' => '0',
			'data' => []
		];

		foreach ($this->_sync_table_list as $t => $n) {
			$arg['data'][] = [
				'table' => $t,
			];
		}

		$res = $this->post_json('', $arg);
		$res = $this->assertValidResponse($res, 200);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['summary']);
		$res = $res['summary'];
		$this->assertCount(19, $res);

	}


	function test_sync_check_list()
	{
		$arg = [
			'action' => 'sync_check',
			'download' => '0',
			'data' => []
		];

		foreach ($this->_sync_table_list as $t => $n) {
			$arg['data'][] = [
				'table' => $t,
				'transaction_start' => 999999999999,
			];
		}

		$res = $this->post_json('', $arg);
		$res = $this->assertValidResponse($res);
		// var_dump($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['summary']);
		$res = $res['summary'];
		$this->assertCount(19, $res);

	}


	function test_sync_fetch()
	{
		// Check if all the things exist and are correct
		$res = $this->post_json('', [
			'action' => 'sync_employee',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['employee']);

		$res = $this->post_json('', [
			'action' => 'sync_id_preassign',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['id_preassign']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_adjust',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory_adjust']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_qa_sample',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory_qa_sample']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_room',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['inventory_room']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_sample',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory_sample']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_transfer',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory_transfer']);

		$res = $this->post_json('', [
			'action' => 'sync_inventory_transfer_inbound',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['inventory_transfer_inbound']);

		$res = $this->post_json('', [
			'action' => 'sync_manifest',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['manifest']);

		$res = $this->post_json('', [
			'action' => 'sync_plant',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['plant']);

		$res = $this->post_json('', [
			'action' => 'sync_plant_derivative',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['plant_derivative']);

		$res = $this->post_json('', [
			'action' => 'sync_plant_room',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['plant_room']);

		$res = $this->post_json('', [
			'action' => 'sync_qa_lab',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['qa_lab']);

		$res = $this->post_json('', [
			'action' => 'sync_sale',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['sale']);

		$res = $this->post_json('', [
			'action' => 'sync_tax_report',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['tax_report']);

		$res = $this->post_json('', [
			'action' => 'sync_third_party_transporter',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['third_party_transporter']);

		$res = $this->post_json('', [
			'action' => 'sync_vehicle',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		// $this->assertIsArray($res['vehicle']);

		$res = $this->post_json('', [
			'action' => 'sync_vendor',
		]);
		$res = $this->assertValidResponse($res);
		$this->assertEquals(1, $res['success']);
		$this->assertIsArray($res['vendor']);

	}

}
