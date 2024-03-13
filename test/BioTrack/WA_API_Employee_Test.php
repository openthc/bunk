<?php

/**
  @todo Tabs, Indents
  @note these are done well, the array calls pased to THC should be copied for others
 */
class WA_API_Employee_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{

	//the object we are going to test
	public $thc;

	protected function setUp() : void
	{
		//initialize the object
		//$this->thc = new RBE_BioTrack_WA();
		$cfg = \OpenTHC\CRE::getEngine('biotrack');
		$this->thc = new \OpenTHC\CRE\BioTrack($cfg);
		//authenticate
		#$this->thc->login();
		#assert ok put a depend on
	}

	function testAdd()
	{
		/*
		  $res = $this->thc->employee_add(array(
		  'name' => 'Test Name',
		  'birth_month' => '10',
		  'birth_day' => '07',
		  'birth_year' => '1986',
		  'hire_month' => '01',
		  'hire_day' => '15',
		  'hire_year' => '2013'
		  ), 'Test Name', );
		 *
		 */
		//initialize the result to test
		$res = array();

		$res = $this->thc->employee_add(
				'2', //employee id
				'Employee Name', //employee name
				'11/01/1975', //date of birth
				'08/13/2013' //date hired
		);


		//test if all are ok
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals($res['success'], 1);
		//the endpoint has been reached

		$res = $this->thc->sync_employee();
		foreach ($res as $rec) {
			// Find the one created, and then eval it.
			if ($rec == 'the one I care about') {
				$this->assertEquals('Employee Name', $rec['name']);
			}
		}

	}

	function testModify()
	{
		/*
		  $res = $this->thc->employee_modify(array(
		  'id' => 47, //employee id
		  'name' => 'Test Name',
		  'birth_month' => '10',
		  'birth_day' => '07',
		  'birth_year' => '1986',
		  'hire_month' => '01',
		  'hire_day' => '15',
		  'hire_year' => '2013'
		  ));
		 *
		 */
		//initialize the result to test


		$res = $this->thc->employee_modify(
				47, //id
				'Test Name', //name
				'11/01/1975', //date of birth
				'08/13/2013' //date hired
			);
		//test if all are ok
		if(empty($res)){
			$res = array();
		}
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals(1, $res['success']);
	}

	function testRemove()
	{
		//initialize the result to test
		$res = array();

		$res = $this->thc->employee_remove(
				47 //employee id
			);
		if(empty($res)){
			$res = array();
		}
		//test if all are ok
		$this->assertArrayHasKey('success', $res);
		//upon success
		$this->assertEquals(1, $res['success']);

	}

}
