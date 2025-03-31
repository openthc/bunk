<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabTestSearch
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				"Test" => [
					[
						"ID" => 0,
						"Name" => "string",
						"Panels" => [
							[
								"AddToTotal" => true,
								"InventoryType" => 0,
								"Name" => "string",
								"PassFailCondition" => "string",
								"PassFailConditional" => true,
								"PassFailLimit" => "string",
								"TestValueRecordOnly" => true,
								"TotalPanel" => true,
								"UOM" => "string"
							]
						]
					]
				]
			]);
	}
}
