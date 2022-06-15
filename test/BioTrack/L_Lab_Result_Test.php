<?php
/**
 * Test Basic Sync
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class L_Lab_Result_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	/**
	 *
	 */
	function test_search()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_qa_check',
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'inventory_qa_check_all',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_create()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_qa_sample',
		]);
		$res = $this->assertValidResponse($res);

		$res = $this->post_json('', [
			'action' => 'inventory_qa_sample_non_mandatory',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_single()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_qa_sample_results',
		]);
		$res = $this->assertValidResponse($res);
	}

	/**
	 *
	 */
	function test_delete()
	{
		$res = $this->post_json('', [
			'action' => 'inventory_qa_sample_void',
		]);
		$res = $this->assertValidResponse($res);
	}

}
