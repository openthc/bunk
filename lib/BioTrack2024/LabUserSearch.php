<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabUserSearch
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				"LabUsers" => [
					[
						"Active" => true,
						"Admin" => true,
						"ID" => 0,
						"TransactionID" => 0,
						"Username" => "string"
					]
				],
				"NextCursor" => 0,
				"NextTransactionID" => 0
			]);
	}
}
