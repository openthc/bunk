<?php
/**
 * Lab Results
 *
 * Documentation Reference:
 * 		- STATE OF WASHINGTON USER MANUAL (version 1.37.5) addendum C
 * 			https://lcb.wa.gov/sites/default/files/publications/Marijuana/traceability/WALeafDataSystems_UserManual_v1.37.5_AddendumC_LicenseeUser.pdf
 * 		- ...
 * Lab cannot enter pesticides and heavy-metals unless it's a medical sample.
 *
 * Question Repo:
 * 		- Can I do batch inventory create?
 */

namespace Laboratory;

class Lab_Result_Search extends \OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		// Reset API Connection to Lab
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-l'],
			'license-secret' => $_ENV['leafdata-license-l-secret'],
		]);
	}


	public function x_test_search()
	{
		$res = $this->get('lab_results');
		$this->assertArrayHasKey('total', $res);
		$this->assertArrayHasKey('per_page', $res);
		$this->assertArrayHasKey('current_page', $res);
		$this->assertArrayHasKey('last_page', $res);
		$this->assertArrayHasKey('next_page_url', $res);
		$this->assertArrayHasKey('prev_page_url', $res);
		$this->assertArrayHasKey('from', $res);
		$this->assertArrayHasKey('to', $res);
		$this->assertArrayHasKey('data', $res);
		$this->assertIsArray($res['data']);
		return $res;

	}

	public function test_search_date()
	{
		$res = $this->get('lab_results?f_date1=2019-06-01');
		$this->assertArrayHasKey('total', $res);
		$this->assertArrayHasKey('per_page', $res);
		$this->assertArrayHasKey('current_page', $res);
		$this->assertArrayHasKey('last_page', $res);
		$this->assertArrayHasKey('next_page_url', $res);
		$this->assertArrayHasKey('prev_page_url', $res);
		$this->assertArrayHasKey('from', $res);
		$this->assertArrayHasKey('to', $res);
		$this->assertArrayHasKey('data', $res);
		$this->assertIsArray($res['data']);

		$c0 = count($res['data']);
		echo "1st Has count: $c0\n";

		$res = $this->get('lab_results?f_date1=2019-07-01');
		$c1 = count($res['data']);
		echo "2nd Has count: $c1\n";

		$this->assertNotEquals($c0, $c1);

		$res = $this->get('lab_results?f_date1=2019-06-15&f_date2=2019-07-01');
		$c2 = count($res['data']);
		echo "3rd Has count: $c2\n";


		$this->assertNotEquals($c0, $c2);
		$this->assertNotEquals($c1, $c2);

		return $res;

	}

}
