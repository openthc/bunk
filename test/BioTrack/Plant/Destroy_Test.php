<?php
/**
 * Test Plant Destruction
 */

namespace Test\Plant;

class Destroy extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	function testPlant_Destroy_Confirm()
	{
		$res = $this->ghc->plant_destroy($id);
		print_r($res);

		$this->assertEquals(1, $res['success']);
	}

	function testPlant_Destroy_Schedule()
	{
		$res = $this->ghc->plant_destroy_schedule(array(
			'action' => 'plant_destroy_schedule',
			//'barcodeid' => $this->//Room[0484 9230 3528 2796] // $id,
			//'reason_extended' => $this->//Room[doo doo doo] // $r_code,
			//'reason' => $this->//Room[doo doo doo] // $r_text,
		));
		print_r($res);

		$this->assertEquals(1, $res['success']);
	}

	function testPlant_Destroy_Schedule_Undo()
	{
		$res = $this->ghc->plant_destroy_schedule_undo($ids); // $ids = 'barcodeid'
		print_r($res);

		$this->assertEquals(1, $res['success']);
	}

}
