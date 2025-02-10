<?php
/**
 * BioTrack v2022 API Group Controller
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class BioTrack2022 extends \OpenTHC\Module\Base
{
	/**
	 * @param \OpenTHC\App $a Slim Application
	 */
	function __invoke(\OpenTHC\App $a)
	{
		// Documentation
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('biotrack-v2022');
		});

		// Authenticate
		$a->post('/v1/login', function($REQ, $RES, $ARG) {

			session_start();

			// Posted JSON
			// 'UBI' =>
			// 'Username' =>
			// 'Password' =>

			// Their Response Looks like a JWT
			return $RES->withJSON([
				'Session' => session_id()
			]);

			// {
			// 	"Session": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdXRob3JpemVkIjp0cnVlLCJleHAiOjE2NDY5NTc3MzYsIm9yZ2lkIjoxNTU4LCJyZWFkb25seSI6ZmFsc2UsInRyYWluaW5nIjpmYWxzZSwidXNlcmlkIjo0OTcsInVzZXJuYW1lIjoiam9zZS56YXBhdGFAZm9yaWFuLmNvbSJ9.xHCQRNha6t7sKkuYixKhtSZ3Z3tctM4nQPzRfmXA-sk"
			//   }

		});

		// B2C Sale
		$a->post('/v1/dispense', function($REQ, $RES, $ARG) {

			// Read Bearer Token
			$tok = preg_match('/^Bearer (.+)$/', $_SERVER['HTTP_AUTHORIZATION'], $m) ? $m[1] : '';
			if (empty($tok)) {
				// Error 403?
			}
			// Start Session from Token
			// session_start();

			$incoming_json = file_get_contents('php://input');
			$incoming_json = json_decode($incoming_json);
			// {
			// 	"LocationLicense": "90090",
			// 	"Type": "RECREATIONAL",
			// 	"TerminalID": "abc123",
			// 	"Datetime": "2022-01-25T15:33:50Z",
			// 	"ExternalID": "37592034",
			// 	"RequestID": "474d83c0-139d-45a0-abcd-4cd1fe31d441",
			// 	"Items": [
			// 	   {
			// 			"Barcode": "1584004777122787",
			// 			"Price": 43.44,
			// 			"Quantity": 56,
			// 			"Tax": {
			// 				"Excise": 4.23,
			// 				"Other": 2.47
			// 			}
			// 		},
			// 		{
			// 			"Barcode": "7387948757852658",
			// 			"Price": 43.44,
			// 			"Quantity": 4,
			// 			"Tax": {
			// 				"Excise": 2.34,
			// 				"Other": 1.23
			// 			}
			// 		}
			// 	]
			// }

			return $RES->withJSON([
				'TransactionID' => \OpenTHC\Bunk\BioTrack\Base::_rnd_transaction_id(),
				'RequestID' => $incoming_json->RequestID,
				'ExternalID' => $incoming_json->ExternalID,
			]);

		});

		// Patient Lookup
		$a->post('/v1/patient/lookup', function($REQ, $RES, $ARG) {

			// Read JSON
			// {
			// 	"CardID": "6553690580672239",
			// 	"LocationLicense": "111000123"
			// }'

			// Respond w/Person
			// {
			// 	"CardActive": true,
			// 	"Sessiontime": 1646418516,
			// 	"CardExpiration": {
			// 	  "Year": "2023",
			// 	  "Month": "09",
			// 	  "Day": "16"
			// 	},
			// 	"CardLimit": 229.49762,
			// 	"Privileges": "Qualified Patient (QP)",
			// 	"CardID": "6162379089849357",
			// 	"CardKey": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdXRob3JpemVkIjp0cnVlLCJjYXJkaWQiOiI2MTYyMzc5MDg5ODQ5MzU3IiwiY3VzdG9tZXJpZCI6IjlhYTNjYzFmMTIiLCJleHAiOjE2NDY0MjkzMTYsImxvY2F0aW9uIjowLCJvcmdpZCI6MTU1OH0.e2CblqUx3aukWLk2IloF49sB21zrY3gzXTxvM0vwuOU"
			//   }
		});

		// Some Session Pinger
		$a->get('/heartbeat', function($REQ, $RES, $ARG) {
			return $RES->withJSON([
				'Status' => 'success',
			]);
		});

	}
}
