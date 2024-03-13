<?php
/**
 * Lab Results
 *
 * Documentation Reference:
 * 		- STATE OF WASHINGTON USER MANUAL (version 1.37.5) addendum C
 * 			https://lcb.wa.gov/sites/default/files/publications/Marijuana/traceability/WALeafDataSystems_UserManual_v1.37.5_AddendumC_LicenseeUser.pdf
 * 		- ...
 * Lab cannot enter pesticides and heavy-metals unless it's a medical sample.
 *
 * Question Repo:
 * 		- Can I do batch inventory create?
 */

namespace Laboratory;

class Lab_Result extends \Test\OpenTHC_Bunk_LeafData_Test
{
	/**
	 * Usage:
	 * 	SAMPLE_ID="WALWTL.IN###" ./vendor/bin/phpunit phpunit test/LeafData/7_Laboratory/Lab_Result.php testCreateFlowerLotResults
	 */
	public function testCreateFlowerLotResults()
	{
		// https://watest.leafdatazone.com/api/v1/inventories?f_global_id={{ $SAMPLE_ID }}
		if (empty(getenv('SAMPLE_ID'))) {
			$text = "MUST PROVIDE SAMPLE_ID IN RUNTIME ARGUMENTS TO TEST";
			echo $text;
			$this->assertEquals('RUNTIME ERROR', $text);
		}
		$sampleId = getenv('SAMPLE_ID');

		$c = new \GuzzleHttp\Client(array(
			'base_uri' => 'https://watest.leafdatazone.com',
			'headers' => [
				'x-mjf-mme-code' => 'LWTL', // $_ENV['leafdata-license'], // 'username',
				'x-mjf-key' => 'yLvwqLv2nMyx1orsHxJD',// $_ENV['leafdata-license-secret'], // 'password'
			],
			'allow_redirects' => false,
			'debug' => $_ENV['debug-http'],
			'request.options' => array(
				'exceptions' => false,
			),
			'http_errors' => false,
			'cookies' => true,

		));

		$res = $c->get(sprintf('/api/v1/inventories?f_global_id=%s', $sampleId));

		$res = json_decode($res->getBody()->getContents(), true);

		$this->assertEquals($res['total'], 1);
		$this->assertEquals($res['from'], 1);
		$this->assertEquals($res['to'], 1);
		$this->assertEquals($res['per_page'], 2500);
		$this->assertTrue(!empty($res['data']));

		$Sample = $res['data'][0];
		$this->assertEquals($sampleId, $Sample['global_id']);
		$this->assertTrue(empty($Sample['labResults']));

		$Result = [
			'global_inventory_id' => $Sample['global_id'],
			'type' => 'harvest_materials',
			'intermediate_type' => 'flower_lots',
			'global_for_mme_id' => $Sample['global_mme_id'],
			'global_batch_id' => 'global_batch_id',
			'global_for_inventory_id' => $Sample['global_original_id'],

			/**
			 * Cannabinoid
			 */
			'testing_status' 				=> 'completed',
			'cannabinoid_d9_thc_percent' 	=> '1',
			'cannabinoid_d9_thca_percent' 	=> '1',
			// 'cannabinoid_d8_thc_percent' 	=> '0',
			'cannabinoid_cbd_percent' 		=> '1',
			'cannabinoid_cbda_percent' 		=> '1',

			/**
			 * General
			 */
			'moisture_content_percent' 				=> '0',
			'foreign_matter' 						=> 'pass',
			'foreign_matter_seeds' 					=> 'pass',
			'foreign_matter_stems' 					=> 'pass',
			'moisture_content_water_activity_rate' 	=> '0',

			/**
			 * Microbial
			 */
			'microbial_status' 					=> 'completed',
			'microbial_salmonella_cfu_g' 		=> '0',
			'microbial_bile_tolerant_cfu_g' 	=> '0',

			/**
			 * Solvent
			 */
			'solvent_status' 				=> 'not_started',
			'solvent_acetone_ppm' 			=> '0',
			'solvent_benzene_ppm' 			=> '0',
			'solvent_butanes_ppm' 			=> '0',
			'solvent_cyclohexane_ppm' 		=> '0',
			'solvent_chloroform_ppm' 		=> '0',
			'solvent_dichloromethane_ppm' 	=> '0',
			'solvent_ethyl_acetate_ppm' 	=> '0',
			'solvent_heptanes_ppm' 			=> '0',
			'solvent_hexanes_ppm' 			=> '0',
			'solvent_isopropanol_ppm' 		=> '0',
			'solvent_methanol_ppm' 			=> '0',
			'solvent_pentanes_ppm' 			=> '0',
			'solvent_propane_ppm' 			=> '0',
			'solvent_toluene_ppm' 			=> '0',
			'solvent_xylene_ppm' 			=> '0',

		];

		$res = $c->post('/api/v1/lab_results', [
			'json' => [
				'lab_result' => $Result
			]
		]);

		$LabResult = json_decode($res->getBody()->getContents(), true);

		$res = $c->get(sprintf('/api/v1/inventories?f_global_id=%s', $sampleId));

		$UpdatedSample = json_decode($res->getBody()->getContents(), true);

		$this->assertEquals($UpdatedSample['labResults']['global_id'], $LabResult['global_id']);


	}

	/**
	 * Old attempt
	 * refactor into unit pieces
	 */
	public function old_testEnterLabResults()
	{
		// $growerConnection = $this->_api('https://watest.leafdatazone.com');
		//$growerConnection = $this->_api('http://localhost:8080/api/v1/');
		// $growerConnection = $this->_api();

		// @todo MBW Reproduce _api()'s GHC here...
		//
		// $labConnection = new \GuzzleHttp\Client(array(
		// 	'base_uri' => 'https://watest.leafdatazone.com',
		// 	'headers' => [
		// 		'x-mjf-mme-code' => $_ENV['leafdata-license-lab'],
		// 		'x-mjf-key' => $_ENV['leafdata-license-secret-lab'],
		// 	],
		// 	'allow_redirects' => false,
		// 	'debug' => $_ENV['debug-http'],
		// 	'request.options' => array(
		// 		'exceptions' => false,
		// 	),
		// 	'http_errors' => false,
		// 	'cookies' => true,

		// ));

		/**
		 * Pivots we're keeping track of
		 */
		$initialConditions = [ // "Pivots"
			'area' => "WAGWT.AR193J",
			'batch' => "WAGWT.BA2DPJ",
			'strain' => "WAGWT.ST1H31",
			'inventory_type' => "WAGWT.TY3Z6L",
			'inventory_at' => '12/01/1970',
			'inventory_packaged_at' => '12/01/1970',
			'global_to_mme_id' => 'WASTATE1.MM1PF', // LWTL
			'global_from_mme_id' => 'WASTATE1.MM1PC' // GWT
		];

		// Grower: Create inventory
		// $inventory = [
		// 	// "external_id" => "-",
		// 	// "is_active" => 1,
		// 	// "inventory_created_at" => $initialConditions['inventory_at'],
		// 	// "inventory_packaged_at" => $initialConditions['inventory_packaged_at'],
		// 	"medically_compliant" => 0,
		// 	"qty" => 1248,
		// 	// "uom" => "ea", // "g" just makes it "ea"
		// 	"global_batch_id" => $initialConditions['batch'],
		// 	"global_area_id" => $initialConditions['area'],
		// 	"global_strain_id" => $initialConditions['strain'],
		// 	"global_inventory_type_id" => $initialConditions['inventory_type'],

		// 	/**
		// 	 * Required / entered only if is_initial_inventory=1,
		// 	 * 		- lab_results_attested
		// 	 * 			stipulates "I attest the attached Quality Assurance Test
		// 	 * 			result is accurate or the marijuana product does not
		// 	 * 			require Quality Assurance Test results at this stage"
		// 	 * 		- legacy_id
		// 	 * 			"Contingency/Old Traceability ID"
		// 	 * 			numeric ID from previous traceability methods
		// 	 * 			(and required) if inventory is designated as "initial_inventory"
		// 	 */
		// 	// "is_initial_inventory" => 1,
		// 	// "legacy_id" => 1234567,
		// 	// "lab_results_attested" => true
		// 	// "legacy_id" => "you-know-my-steez", // This is supposed to be an integer lmao
		// 	// "lab_results_attested" => 'i dont have to enter a valid boolean here does that mean i dont attest?'
		// ];

		$inventory = [
			"global_area_id" => "WAGWT.ARQY5",
			"global_batch_id" => "WAGWT.BA3NA1",
			"global_inventory_type_id" => "WAGWT.TY5EVU",
			"global_strain_id" => "WAGWT.ST1H31",
			"qty" => 50,
			"medically_compliant" => 0
		];

		$x = [
			'inventory' => [
				$inventory
			],
		];

		$inventoryCreateResponse = $this->post('inventories', $x);
		$Inventory = array_shift($inventoryCreateResponse);

		// Grower: Add inventory to manifest, create new manifest, send to Lab
		$inventory_transfer = [
			'est_arrival_at' => '12/01/1970 12:00 AM', // mm/dd/yyyy hh:mm XM
			'est_departed_at' => '12/01/1970 12:00 AM',
			'global_inventory_id' => $Inventory['global_id'], // global ID relative to the sending facility of the inventory lot being transferred
			'global_to_mme_id' => $initialConditions['global_to_mme_id'],  // global ID of the licensee recipient of the transfer
			'qty' => '1.0',
			'uom' => $Inventory['uom'],

			'vehicle_license_plate' => 'OPENTHC',
			'vehicle_vin' => '1Z2Y3X4W5V6U7T8S',

			// Magic constant that are required & required to be zero on every transfer creation
			'multi-stop' => 0,

			/**
			 * Manifest Type (enum)
			 * delivery, pick-up, transporter
			 *
			 * Required / enter only if manifest_type=transporter
			 * 		- global_transporting_mme_id
			 * 			Global ID of the licensee type "licensed transporter"
			 * 			who is performing the transport
			 *
			 * Required / enter only if manifest_type=delivery
			 * 		- transporter_name1
			 * 			 name of the driver
			 */
			'manifest_type' => 'pick-up',
			// 'global_transporting_mme_id' => '',
			// 'transporter_name1' => '',
		];

		echo json_encode($inventory_transfer) . "\n";
		// Lab: Accept transferred inventory

		// Lab: Find sample inventory from accepted txn, or from origin inventory (on manifest)

		// Lab: Enter cannabinoid results

		$unprocessableEntity = [
			/**
				 ""required params""
			*/
			// 'external_id' => '-', // required?
			// 'global_inventory_id' => '', // "WAX123456.IN1Z2Y3"
			// 'cannabinoid_status' => 'completed', // [not_started,in_progress,completed]
			// 'metal_status' 		=> 'completed', // $this->metricToLeafMetric($post['metal_status']),
			// 'microbial_status' 	=> 'completed', // $this->metricToLeafMetric($post['microbial_status']),
			// 'mycotoxin_status' 	=> 'completed', // $this->metricToLeafMetric($post['mycotoxin_status']),
			// 'pesticide_status' 	=> 'completed', // $this->metricToLeafMetric($post['pesticide_status']),
			// 'solvent_status' 	=> 'completed', // $this->metricToLeafMetric($post['solvent_status']),
			// 'testing_status' 	=> 'completed', // $this->metricToLeafMetric($post['testing_status']),

			"external_id" => 'test',
			"tested_at" => '06/10/2019 12:34pm',
			"testing_status" => "completed",
			"notes" => "test notes",
			"received_at" => '06/10/2019 12:34pm',
			"type" => "harvest_materials",
			"intermediate_type" => 'flower_lots',
			"moisture_content_percent" => "1",
			"moisture_content_water_activity_rate" => ".635",
			// "cannabinoid_status" => "completed",
			// "cannabinoid_d9_thca_percent" => sprintf("%01.3f", $post['cannabinoid_d9_thca_percent']),
			// "cannabinoid_d9_thca_mg_g" => null,
			// "cannabinoid_d9_thc_percent" => sprintf("%01.3f", $post['cannabinoid_d9_thc_percent']),
			// "cannabinoid_d9_thc_mg_g" => null,
			// "cannabinoid_cbd_percent" => sprintf("%01.3f", $post['cannabinoid_cbd_percent']),
			// "cannabinoid_cbd_mg_g" => null,
			// "cannabinoid_cbda_percent" => sprintf("%01.3f", $post['cannabinoid_cbda_percent']),
			// "cannabinoid_cbda_mg_g" => null,
			"microbial_status" => "completed",
			"microbial_bile_tolerant_cfu_g" => "0.00",
			"microbial_pathogenic_e_coli_cfu_g" => "0.00",
			"microbial_salmonella_cfu_g" => "0.00",
			"mycotoxin_status" => "completed",
			"mycotoxin_aflatoxins_ppb" => "19.99",
			"mycotoxin_ochratoxin_ppb" => "19.99",
			"solvent_status" => "not_started",
			"solvent_acetone_ppm" => null,
			"solvent_benzene_ppm" => null,
			"solvent_butanes_ppm" => null,
			"solvent_cyclohexane_ppm" => null,
			"solvent_chloroform_ppm" => null,
			"solvent_dichloromethane_ppm" => null,
			"solvent_ethyl_acetate_ppm" => null,
			"solvent_heptanes_ppm" => null,
			"solvent_hexanes_ppm" => null,
			"solvent_isopropanol_ppm" => null,
			"solvent_methanol_ppm" => null,
			"solvent_pentanes_ppm" => null,
			"solvent_propane_ppm" => null,
			"solvent_toluene_ppm" => null,
			"solvent_xylene_ppm" => null,

			/**
			 * Format: boolean
			 * The results of the foreign matter
			 * screening for stems ("0"=passing, "1"=failing)
			 */
			"foreign_matter_stems" => "0", // $this->metricToLeafMetric(),
			"foreign_matter_seeds" => "0", // $this->metricToLeafMetric(''),
			"test_for_terpenes" => null,
			"global_for_mme_id" => $meta['global_mme_id'],

			/**
			 * Format: WAX123456.IN1Z2Y3
			 * Global id, Relative to Lab, of inv lot being tested.
			 */
			// "global_inventory_id" => $sample_id,
			"global_inventory_id" => $Sample['meta']['global_received_inventory_id'],

			/**
			 * Format: WAX123456.BA1Z2Y3
			 * global ID of the batch associated
			 * with the inventory lot that the sample came from
			 * Documentation says auto generated
			 */
			// "global_batch_id" => $Sample['global_batch_id'],
			"global_batch_id" => $Sample['meta']['global_received_batch_id'],

			/**
			 *
			 */
			// "global_for_inventory_id" => $meta['global_inventory_id'],
			"global_for_inventory_id" => $meta['global_received_inventory_id'],
		];
	}
}
