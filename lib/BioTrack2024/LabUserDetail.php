<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabUserDetail
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				"LabUser" => [
					"Active" => true,
					"Admin" => true,
					"ID" => 0,
					"TransactionID" => 0,
					"Username" => "string"
				]
			]);
	}
}
