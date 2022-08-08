<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\C_LabTests;

class A_Document_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'labtests/v1/labtestdocument';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"LabTestResultId" =>  1,
				"DocumentFileName" => "Medigrazers Lab Results 20181215.pdf",
				"DocumentFileBase64" => "File encoded in Base64==",
			],
			[
				"LabTestResultId" => 2,
				"DocumentFileName" => "Medigrazers Lab Results 20190215.pdf",
				"DocumentFileBase64" => "File encoded in Base64==",
			]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
