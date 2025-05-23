<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack2024;

class UserDetail
{
	function __invoke($REQ, $RES, $ARG)
	{
		return $RES->withJSON([
			'User' => [
				'Active' => true,
				'Admin' => true,
				'ID' => 0,
				'Permission' => [
					'string',
				],
				'TransactionID' => 0,
				'Username' => 'string',
			],
		]);
	}
}
