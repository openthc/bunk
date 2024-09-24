<?php
/**
 * Sales Force Ticket 00239334
 * Plants have invalid Origin Fields
 */

namespace OpenTHC\Bunk\Test\LeafData\Plant;

class Invalid_Origin extends \Test\OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-g'],
			'license-secret' => $_ENV['leafdata-license-g-secret'],
		]);
	}

	function test_origin_invalid()
	{
		$res = $this->get('plants');
		$this->assertIsArray($res['data']);
		foreach ($res['data'] as $p) {
			switch ($p['origin']) {
			case '':
				$this->assertNotEmpty($p['origin'], 'A Plant Origin is Empty!');
				break;
			case 'none':
				$this->assertNotEquals('none', $p['origin'], 'A Plant Origin is still "none"!');
				break;
			}
		}

	}

}
