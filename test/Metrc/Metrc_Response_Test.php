<?php

	namespace TEST\Metrc;

	class Metrc_Response_Test extends \Test\Metrc_Test 
	{
		
		private $metrc_curl = array(
			['GET', '/facilities/v1']
		);


		function test_valid_response() {
			foreach ($this->$metrc_curl as $url) {
				$res = $this->ghc->request($url[0], $url[1]);

				if ($url[0] <> "DELETE"){
					$this->assertValidResponse($res);
				} else {
					$this->assertValidDelete($res);
				}
			}
		}
		
	}