<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\C_LabTests;

class B_Record_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'labtests/v1/record';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"Label" => "ABCDEF012345670000000001",
				"ResultDate" => "2015-12-15T00 =>00 =>00Z",
				"DocumentFileName" => "Sparkly Ventures Lab Results 20151215.pdf",
				"DocumentFileBase64" => "File encoded in Base64==",
				"Results" => [
					[
					"LabTestTypeName" => "THC",
					"Quantity" => 100.2345,
					"Passed" => true,
					"Notes" => ""
					]
				]
			],
			[
				"Label" => "ABCDEF012345670000000002",
				"ResultDate" => "2015-12-15T00 =>00 =>00Z",
				"DocumentFileName" => null,
				"DocumentFileBase64" => null,
				"Results" => [
					[
					"LabTestTypeName" => "THC",
					"Quantity" => 100.2345,
					"Passed" => true,
					"Notes" => ""
					]
				]
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
