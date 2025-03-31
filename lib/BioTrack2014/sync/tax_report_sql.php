<?php
/**
	Return the Tax Obligation Reports
*/

/*
 * Discovered without a supporting `switch` statement /mbw 2024-073
case 'sync_tax_report':
	return $RES->withJSON(array(
		'success' => 1,
		'tax_report'=> array(
			0 => array(
				"amount_due" => "100.00",
				"deleted" => "0",
				"excise_tax" => "100.00",
				"gross_sales" => "400.00",
				"location" => "18750",
				"month" => "5",
				"submit_time" => "1402990546",
				"time_end" => "1401595199",
				"time_start" => "1398916800",
				"transactionid" => "12356",
				"transactionid_original" => "12356",
				"year" => "2014",
			),
		)
));
 */


use Edoceo\Radix\DB\SQL;

SQL::init(sprintf('sqlite:%s/var/%09d.db', APP_ROOT, $_SESSION['ubi']));

//SQL::query('CREATE TABLE sync_tax_report (id INTEGER PRIMARY KEY, meta TEXT)');
$ret = array(
	'success' => 1,
	'tax_report' => array(),
);

$res = SQL::fetch_all('SELECT * FROM sync_tax_report');
foreach ($res as $rec) {
	$row = json_decode($rec['meta'], true);
	$ret['tax_report'][] = $row;
}

return $RES->withJSON($ret);
