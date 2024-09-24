<?php
/**
 * A Slim Response for BioTrack w/Preferred Output Options
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack;

class Response extends Slim\Http\Response
{
	function withJSON($json, $code=200, $opts=0)
	{
		$opts = ($opts | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
		return parent::withJSON($json, $code, $opts);
	}
}
