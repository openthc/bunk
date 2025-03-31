<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class SaleUpdate
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			"CardID" => "string",
			"CreatedByUserID" => 0,
			"CreatedOn" => "string",
			"Deleted" => true,
			"ExternalID" => "string",
			"ID" => 0,
			"Item" => [
				[
					"Barcode" => "string",
					"ExternalID" => "string",
					"FormID" => 0,
					"ItemNumber" => 0,
					"OrderTypeID" => 0,
					"Price" => 0,
					"Quantity" => 0,
					"TaxCollected" => [
						"Excise" => 0,
						"Other" => 0
					],
					"TransactionID" => 0,
					"VoidReason" => "string"
				]
			],
			"Location" => 0,
			"OrderingPhysician" => "string",
			"RequestID" => "string",
			"TransactionID" => 0,
			"Type" => "string",
			"UpdatedOn" => "string"
		]);
	}
}
