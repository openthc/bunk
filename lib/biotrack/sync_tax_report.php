<?php
/**
	Return the Tax Obligation Reports
*/

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
