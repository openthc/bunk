<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabUserUpdate
{
	// Create?
	function __invoke($REQ, $RES, $ARG)
	{
			return $RES->withJSON([
				"LabUser" => [
					"Active" => true,
					"Admin" => true,
					"ID" => 0,
					"Username" => "string"
				],
				"SessionTime" => 0,
				"TransactionID" => 0
			]);
	}

	// PUT
	function put($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			"LabUser" => [
				"Active" => true,
				"Admin" => true,
				"ID" => 0,
				"Username" => "string"
			],
			"SessionTime" => 0,
			"TransactionID" => 0
		]);
	}

}
