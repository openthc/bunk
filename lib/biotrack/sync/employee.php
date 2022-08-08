<?php
/**
 * Sync Employee
 *
 * SPDX-License-Identifier: MIT
 */

use \OpenTHC\Bunk\BioTrack\Base;

return $RES->withJSON(array(
	'success' => 1,
	'employee' => array(
		0 => array(
			"birthday" => "01",
			"birthmonth" => "02",
			"birthyear" => "1980",
			"deleted" => "0",
			"employee_id" => "12384",
			"employee_name" => "new Guy",
			"hireday" => "23",
			"hiremonth" => "12",
			"hireyear" => "2013",
			"transactionid" => "3570",
			"transactionid_original" => "3570"
		),
		1 => array(
			"birthday" => "01",
			"birthmonth" => "01",
			"birthyear" => "1980",
			"deleted" => "0",
			"employee_id" => "123467",
			"employee_name" => "Test",
			"hireday" => "03",
			"hiremonth" => "03",
			"hireyear" => "2014",
			"transactionid" => "3946",
			"transactionid_original" => "3946"
		),
	)
));
