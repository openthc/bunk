<?php
/**

*/

//use Edoceo\Radix\DB\SQL;

return $RES->withJSON(array(
	'success' => 1,
	'qa_lab' => array(
			0 => array(
				"address1" => "1234 Address Way",
				"city" => "City",
				"location" => "999977",
				"name" => "QTest5",
				"state" => "WA",
				"transactionid" => "2",
				"transactionid_original" => "1",
				"zip" => "12345",
		),
	),
));

// break;
//

//$vendor_list = array(
//	'100111111',
//	'200222222',
//	'300333333',
//	'400444444',
//	'500555555',
//	'600666666',
//	'700777777',
//	'800888888',
//	'900999999',
//);

$sql = 'SELECT company.guid AS company_guid';
$sql.= ', license.guid AS license_guid';
$sql.= ', license.name AS license_name';
$sql.= ', license.kind AS license_kind';
$sql.= ' FROM company JOIN license ON company.id = license.company_id';
$sql.= ' WHERE license.kind = :kind AND license.flag & :flag_0 = 0';

$arg = array(
	'kind' => 'QA',
	':flag_0' => License::FLAG_DEAD,
);

$res_license = SQL::fetch_all($sql, $arg);

foreach ($res_license as $rec) {

	$ret['qa_lab'][] = array(
		'ubi' => $rec['company_guid'],
		'location' => $rec['license_guid'],
		'name' => $rec['license_name'],
		'_license_type' => $rec['license_type'],
		// 'locationtype' => 8,
		// 'address1' => sprintf('%d Address Way', substr($v, -3)),
		// 'city' => 'Seattle',
		// "state" => 'XX',
		// "zip" => "986420000",
		'processor' => 0,
		'producer' => 0,
		'retail' => 0,
		'deleted' => 0,
		'medical' => 0,
		'transactionid' => strtotime($rec['company_date']),
		'transactionid_original' => strtotime($rec['company_date']),
	);

}

return $RES->withJSON($ret);
