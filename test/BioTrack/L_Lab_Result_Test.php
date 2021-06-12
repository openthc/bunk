<?php
/**
 * Test Basic Sync
 */

namespace Test\BioTrack;

class L_Lab_Result_Test extends \Test\BioTrack_Test
{
	function test_search()
	{
		// _curl_post '{ "action": "inventory_qa_check" }'
		// _curl_post '{ "action": "inventory_qa_check_all" }'
	}

	function test_create()
	{
		// _curl_post '{ "action": "inventory_qa_sample" }'
		// _curl_post '{ "action": "inventory_qa_sample_non_mandatory" }'
	}

	function test_single()
	{
		// _curl_post '{ "action": "inventory_qa_sample_results" }'
	}

	function test_delete()
	{
		// _curl_post '{ "action": "inventory_qa_sample_void" }'
	}

}
