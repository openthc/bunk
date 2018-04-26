<?php
/**
	Save the Tax Obligation File
*/

//use Edoceo\Radix\DB\SQL;

//return $RES->withJSON(array(
//	'success' => 0,
//	'error' => 'You requested a verification for the tax obligation report but did not provide BOTH the gross sales and excise tax due.',
//	'errorcode' => 602,
//));

/*
{\"success\":0,\"errorcode\":\"602\",\"error\":\"You requested a verification for the tax obligation report and the submitted gross sales of 0 did not match the previously reported amount of 38765.23. (38765.23,0,0.00,0.00,,,0,0,38765.23,0.00).
*/

/*
{\"success\":0,\"error\":\"The tax obligation report for this period has already been filed and will need to be unlocked by the WSLCB before it can be re-filed.\",\"errorcode\":\"602\"}
*/

//SQL::init(sprintf('sqlite:%s/var/%09d.db', APP_ROOT, $_SESSION['ubi']));
//SQL::query('CREATE TABLE sync_tax_report (id INTEGER PRIMARY KEY, meta TEXT)');

$txn = _rnd_transaction_id();

$ts_alpha = mktime(0, 0, 1, $json['month'], 1, $json['year']);
$ts_omega = mktime(23, 59, 59, $json['month'] + 1, 0, $json['year']);

$arg = array();
$arg['meta'] = json_encode(array(
	'deleted' => 0,
	'amount_due' => floatval($json['excise_tax']),
	'excise_tax' => floatval($json['excise_tax']),
	'gross_sales' => floatval($json['gross_sales']),
	'location' => trim($json['location']),
	'month' => intval($json['month']),
	'year' => intval($json['year']),
	'submit_time' => $_SERVER['REQUEST_TIME'],
	're_submit_time' => null,
	'time_start' => $ts_alpha,
	'_time_start_iso' => strftime('%Y-%m-%d %H:%M:%S', $ts_alpha),
	'time_end' => $ts_omega,
	'_time_end_iso' => strftime('%Y-%m-%d %H:%M:%S', $ts_omega),
	'transactionid' => $txn,
	'transactionid_original' => $txn,
));

//SQL::insert('sync_tax_report', $arg);

//Radix::dump($_SESSION);
//Radix::dump($json);
//Radix::dump($arg);

return $RES->withJSON(array(
	'success' => 1,
	'sessiontime' => $_SERVER['REQUEST_TIME'],
	'transactionid' => $txn,
	'excise_tax' => floatval($json['excise_tax']),
	'total_sales' => floatval($json['gross_sales']),
));
