	function testEmployee_Add()
	{
		$res = $this->ghc->employee_add('132412', 'michael', '1996-07-01', '2016-04-03');
		echo "\nEmployee Add Result:\n";
		print_r($res);
		echo "\n";
		// $res should be Data Array
		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
		// $this->assertXXX($truth, $check);
	}

	function _testEmployee_Modify()
	{
		$res = $this->ghc->employee_modify('132412', 'michael', '1996-10-01', '2016-07-23');
		print_r($res);
		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}

	function _textEmployee_Remove()
	{
		$res = $this->ghc->employee_remove('132412', 'michael', '1996-07-01', '2016-11-12');
		print_r($res);
		$this->assertEquals(1, $res['success']);
		$this->assertArrayHasKey('transactionid', $res);
		if (!empty($res['transactionid'])) {
			$this->assertRegExp('/^\d+$/', $res['transactionid']);
		}
	}
