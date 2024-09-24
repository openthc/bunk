<?php
/**


*/

namespace OpenTHC\Bunk\Test\LeafData\Plant;

class Plant_From_Clone extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function testPlant_From_Clone()
	{
		$inv_guid = 'WAGWT.INYTE';

		$I = $this->_rbe->inventory()->one($inv_guid);
		_echo_as_json($I);
		$old_qty = floatval($I['qty']);

		$res = $this->_rbe->inventory()->plant($inv_guid, 1);

		_echo_as_json($res);

		$this->assertEquals('success', $res['status']);

		$plant_list = $res['result'];

		$this->assertEquals(1, count($plant_list), 'Did not create two Plants');

		// Now Fetch the Plant
		$P = $this->_rbe->plant()->one( $plant_list[0]['global_id']);
		_echo_as_json($P);

		// Now Fetch the Batch
		$B = $this->_rbe->batch()->one( $plant_list[0]['global_batch_id']);
		_echo_as_json($B);

		// This Batch is WAYYYY Wrong

		//$R = $this->_rbe->area()->one( $plant_list[0]['global_area_id']);
		//echo json_encode($R, JSON_PRETTY_PRINT);

		// Fetch the Inventory Again
		$i1 = $this->_rbe->inventory()->one($inv_guid);
		$new_qty = floatval($i1['qty']);
		$this->assertEquals(1, $old_qty - $new_qty);

		_echo_as_json($i1);

/*
[{
	"origin":"inventory",
	"stage":"veg",
	"updated_at":"02\/24\/2018 04:45pm",
	"created_at":"02\/24\/2018 04:45pm",
	"global_id":"WAGWT.PL4DX8",
	"global_mme_id":"WASTATE1.MM1PC",
	"global_user_id":"WASTATE1.US2GM",
	"global_batch_id":"WAGWT.BA2L5C",
	"global_area_id":"WAGWT.ARQY5",
	"global_mother_plant_id":null,
	"global_strain_id":"WAGWT.ST1H31"
},
{
	"origin":"inventory",
	"stage":"veg",
	"updated_at":"02\/24\/2018 04:45pm",
	"created_at":"02\/24\/2018 04:45pm",
	"global_id":"WAGWT.PL4DX9",
	"global_mme_id":"WASTATE1.MM1PC",
	"global_user_id":"WASTATE1.US2GM",
	"global_batch_id":"WAGWT.BA2L5C",
	"global_area_id":"WAGWT.ARQY5",
	"global_mother_plant_id":null,
	"global_strain_id":"WAGWT.ST1H31"
}]
*/
		//print_r($res);

	}

}
