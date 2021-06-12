<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class R_Retail_Sale_Test extends \Test\BioTrack_Test
{
	function create()
	{
		// _curl_post '{ "action": "sale_dispense" }'
	}
	function update()
	{
		// _curl_post '{ "action": "sale_modify" }'
	}

	function refund()
	{
		// _curl_post '{ "action": "sale_refund" }'
	}

	function delete()
	{
		// _curl_post '{ "action": "sale_void" }'
	}

}
