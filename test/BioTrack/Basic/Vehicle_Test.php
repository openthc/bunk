<?php
/**
 *
 */

namespace Test\Basic;

class Vehicle extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

	function test_create()
	{
		$res = $this->thc->vehicle_add(array(
			'gid' => 2,
			'name' => 'BatMobile',
			'year' => 1949,
			'make' => 'Sedan',
			'model' => '',
			'color' => '',
			'tag' => '',
			'vin' => ''
		));

		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		//test if all are ok
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);


	}

	function testModify()
	{
		$thc = new RBE_BioTrack_WA();
		$thc->login('ll', 'uu', 'pp');
		$res = $thc->vehicle_modify(array(
			'id' => 3,
			'gid' => 2,
			'name' => 'BatMobile',
			'year' => 1949,
			'make' => 'Sedan',
			'model' => '',
			'color' => '',
			'tag' => '',
			'vin' => ''
		));
		//test if all are ok
						//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);


	}

	function testRemove()
	{
		$thc = new RBE_BioTrack_WA();
		$thc->login('ll', 'uu', 'pp');

		$res = $thc->vehicle_remove(array(
			'id' => 1234,
			'status' => 'remove'
		));
				//test if all are ok
		if(empty($res)){
			$res = array();
		}
		//test if all are ok
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);


	}

}


	function testVehicle_Add()
	{
		$res = $this->rbe->vehicle_add(array(
                        'vehicle_id' => $this->Vehicle['12345'],
                        'year' =>  $this->Vehicle['2006'],
                        'make' =>  $this->Vehicle['honda'],
                        'model' => $this->Vehicle['pilot'],
                        'color' => $this->Vehicle['green'],
                        'plate' => $this->Vehicle['123456'],
                        'vin' =>   $this->Vehicle['1231231231231231234'],));
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testVehicle_Modify()
	{
		$res = $this->rbe->vehicle_modify(array(
                        'vehicle_id' => $this->Vehicle['12345'],
                        'year' =>  $this->Vehicle['2006'],
                        'make' =>  $this->Vehicle['honda'],
                        'model' => $this->Vehicle['pilot'],
                        'color' => $this->Vehicle['green'],
                        'plate' => $this->Vehicle['123456'],
                        'vin' =>   $this->Vehicle['1231231231231231234'],));
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function testVehicle_Remove()
	{
		$res = $this->rbe->vehicle_remove('12345');
		print_r($res);

		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}
