<?php
/**
 * Test Basic Sync
 */

namespace OpenTHC\Bunk\Test\BioTrack;

class I_Inventory_Test extends \OpenTHC\Bunk\Test\BioTrack_Test
{
	protected function setUp() : void
	{
		parent::setUp();
		$this->auth('g');
	}

}

// #
// #
// ##_curl '{ "action": "inventory_adjust", }'
// ##_curl '{ "action": "inventory_adjust_usable", }'
// ##_curl '{ "action": "inventory_convert", }'
// ##_curl '{ "action": "inventory_sample", }'
// ##_curl '{ "action": "inventory_split", }'
// _curl_post '{ "action": "inventory_adjust" }'
// _curl_post '{ "action": "inventory_adjust_usable" }'
// _curl_post '{ "action": "inventory_check" }'
// _curl_post '{ "action": "inventory_convert" }'
// _curl_post '{ "action": "inventory_convert_undo" }'
// _curl_post '{ "action": "inventory_create_lot" }'
// _curl_post '{ "action": "inventory_destroy" }'
// _curl_post '{ "action": "inventory_destroy_schedule" }'
// _curl_post '{ "action": "inventory_destroy_schedule_undo" }'


// _curl_post '{ "action": "inventory_modify" }'
// _curl_post '{ "action": "inventory_move" }'
// _curl_post '{ "action": "inventory_new" }'

// _curl_post '{ "action": "inventory_sample" }'
// _curl_post '{ "action": "inventory_split" }'
