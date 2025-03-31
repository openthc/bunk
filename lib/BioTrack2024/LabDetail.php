<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class LabDetail
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
				'Lab' => [
					'Address1' => 'string',
					'City' => 'string',
					'Deleted' => 0,
					'ID' => 0,
					'LicenseNumber' => 'string',
					'Name' => 'string',
					'Phone' => 'string',
					'State' => 'string',
					'TransactionID' => 0,
					'Zip' => 'string',
				],
			]
			);
	}
}
