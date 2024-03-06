<?php
/**
 * Test Basic Sync
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class I_Inventory_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	/**
	 * @test
	 */
	function inventory_adjust()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_adjust',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_adjust_usable()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_adjust_usable',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_check()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_check',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_convert()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_convert',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_convert_undo()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_convert_undo',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_create_lot()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_create_lot',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_destroy()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_destroy',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_destroy_schedule()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_destroy_schedule',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_destroy_schedule_undo()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_destroy_schedule_undo',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_modify()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_modify',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_move()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_move',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_new()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_new',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_sample()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_sample',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 */
	function inventory_split()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_split',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 * @test
	 * Inventory QA Check
	 */
	function inventory_qa_check()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_qa_check',
		]);
		$res = $this->assertValidResponse($res);

	}

	/**
	 * @test
	 * Inventory QA Check All
	 */
	function inventory_qa_check_all()
	{
		/* // No trivial responses cases found /mbw 2024-058
		$res = $this->post_json('', [
			'action' => 'inventory_qa_check_all',
		]);
		$res = $this->assertValidResponse($res);
		*/

		$res = $this->post_json('', [
			'action' => 'inventory_qa_check_all',
			'barcodeid' => [ '2024058110000001' ]
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'inventory_qa_check_all',
			'barcodeid' => [ '-' ]
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'inventory_qa_check_all',
			'barcodeid' => [ '2024058110000001', '2024058120000001' ]
		]);
		$res = $this->assertValidResponse($res);

	}
}
