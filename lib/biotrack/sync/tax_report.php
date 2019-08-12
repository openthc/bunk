<?php
/**
 * Return the Tax Obligation Reports
 */

return $RES->withJSON(array(
	'success' => 1,
	'tax_report'=> array(
		0 => array(
			"amount_due" => "100.00",
			"deleted" => "0",
			"excise_tax" => "100.00",
			"gross_sales" => "400.00",
			"location" => "999999",
			"month" => "1",
			"submit_time" => "1402990546",
			"time_end" => "1391126400",
			"time_start" => "1388534400",
			"transactionid" => "12356",
			"transactionid_original" => "12356",
			"year" => "2014",
		),
		1 => array(
			"amount_due" => "100.00",
			"deleted" => "0",
			"excise_tax" => "100.00",
			"gross_sales" => "400.00",
			"location" => "999999",
			"month" => "2",
			"submit_time" => "1402990546",
			"time_end" => "1393545600",
			"time_start" => "1391212800",
			"transactionid" => "123567",
			"transactionid_original" => "123567",
			"year" => "2014",
		),
	)
));
