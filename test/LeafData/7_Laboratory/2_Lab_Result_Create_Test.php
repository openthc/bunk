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

class Lab_Result_Create extends \OpenTHC_Bunk_LeafData_Test
{
	protected function setUp() : void
	{
		// Reset API Connection to Lab
		$this->ghc = $this->_api([
			'license' => $_ENV['leafdata-license-l'],
			'license-secret' => $_ENV['leafdata-license-l-secret'],
		]);
	}
	/**
	 * Usage:
	 * 	SAMPLE_ID="WALWTL.IN###" ../vendor/bin/phpunit LeafData/7_Laboratory/Lab_Result.php
	 */
	public function test_create_lab_result()
	{

		// https://watest.leafdatazone.com/api/v1/inventories?f_global_id={{ $SAMPLE_ID }}
		// if (empty(getenv('SAMPLE_ID'))) {
		// 	// $text = "MUST PROVIDE SAMPLE_ID IN RUNTIME ARGUMENTS TO TEST";
		// 	// echo $text;
		// 	// $this->assertEquals('RUNTIME ERROR', $text);
		// }
		$sample_lot_id = getenv('SAMPLE_L0');
		$this->assertNotEmpty($sample_lot_id, 'Provide a Laboratory Sample ID for this Test');

		$res = $this->get(sprintf('/api/v1/inventories?f_global_id=%s', $sample_lot_id));

		$this->assertEquals($res['total'], 1);
		$this->assertEquals($res['from'], 1);
		$this->assertEquals($res['to'], 1);
		$this->assertEquals($res['per_page'], 2500);
		$this->assertTrue(!empty($res['data']));

		$Sample = $res['data'][0];
		$this->assertEquals($sample_lot_id, $Sample['global_id']);
		$this->assertNotEmpty($Sample['global_mme_id']);
		$this->assertNotEmpty($Sample['global_original_id']);
		//$this->assertTrue(empty($Sample['labResults']));

		$Result = [

			'global_inventory_id' => $Sample['global_id'],
			'global_for_mme_id' => $Sample['global_mme_id'],
			'global_for_inventory_id' => $Sample['global_original_id'],

			/**
			 * General
			 */
			'testing_status'                       => 'completed',
			'foreign_matter'                       => 'pass',
			'foreign_matter_seeds'                 => 'pass',
			'foreign_matter_stems'                 => 'pass',
			'moisture_content_percent'             => '12',
			'moisture_content_water_activity_rate' => 0.12,

			/**
			 * Cannabinoid
			 */
			'cannabinoid_status' => 'completed',
			'cannabinoid_cbc_mg_g'        => 12.345,
			'cannabinoid_cbc_percent'     => 12.345,
			'cannabinoid_cbd_mg_g'        => 12.345,
			'cannabinoid_cbd_percent'     => 12.345,
			'cannabinoid_cbda_mg_g'       => 12.345,
			'cannabinoid_cbda_percent'    => 12.345,
			'cannabinoid_cbdv_mg_g'       => 12.345,
			'cannabinoid_cbdv_percent'    => 12.345,
			'cannabinoid_cbg_mg_g'        => 12.345,
			'cannabinoid_cbg_percent'     => 12.345,
			'cannabinoid_cbga_mg_g'       => 12.345,
			'cannabinoid_cbga_percent'    => 12.345,
			'cannabinoid_cbn_mg_g'        => 12.345,
			'cannabinoid_cbn_percent'     => 12.345,
			'cannabinoid_d8_thc_mg_g'     => 12.345,
			'cannabinoid_d8_thc_percent'  => 12.345,
			'cannabinoid_d9_thc_mg_g'     => 12.345,
			'cannabinoid_d9_thc_percent'  => 12.345,
			'cannabinoid_d9_thca_mg_g'    => 12.345,
			'cannabinoid_d9_thca_percent' => 12.345,
			//'cannabinoid_thcv_mg_g' => '1.000',
			//'cannabinoid_thcv_percent' => '1.000',

			/**
			 * Metal
			 */
			'metal_status' => 'completed',
			'metal_arsenic_ppm' => 0,
			'metal_cadmium_ppm' => 0,
			'metal_lead_ppm'    => 0,
			'metal_mercury_ppm' => 0,

			/**
			 * Microbial
			 */
			'microbial_status' => 'completed',
			'microbial_salmonella_cfu_g' => 0,
			'microbial_bile_tolerant_cfu_g' => 0,

			/**
			 * Mycotoxin
			 */
			'mycotoxin_status' => 'completed',
			'mycotoxin_aflatoxins_ppb' => 0,
			'mycotoxin_ochratoxin_ppb' => 0,

			/**
			 * Pesticide
			 */
			'pesticide_status' => 'completed',
			'pesticide_abamectin_ppm'=> 0,
			'pesticide_acephate_ppm' => 0,
			'pesticide_acequinocyl_ppm' => 0,
			'pesticide_acetamiprid_ppm' => 0,
			'pesticide_aldicarb_ppm' => 0,
			'pesticide_azoxystrobin_ppm' => 0,
			'pesticide_bifenazate_ppm' => 0,
			'pesticide_bifenthrin_ppm' => 0,
			'pesticide_bifentrin_ppm' => 0,
			'pesticide_boscalid_ppm' => 0,
			'pesticide_captan_ppm' => 0,
			'pesticide_carbaryl_ppm' => 0,
			'pesticide_carbofuran_ppm' => 0,
			'pesticide_chlorantraniliprole_ppm' => 0,
			'pesticide_chlorfenapyr_ppm' => 0,
			'pesticide_chlorpyrifos_ppm' => 0,
			'pesticide_clofentezine_ppm' => 0,
			'pesticide_cyfluthrin_ppm' => 0,
			'pesticide_cypermethrin_ppm' => 0,
			'pesticide_daminozide_ppm' => 0,
			'pesticide_ddvp_dichlorvos_ppm' => 0,
			'pesticide_diazinon_ppm' => 0,
			'pesticide_dimethoate_ppm' => 0,
			// 'pesticide_dimethomorph_ppm' => 0,
			'pesticide_ethoprophos_ppm' => 0,
			'pesticide_etofenprox_ppm' => 0,
			'pesticide_etoxazole_ppm' => 0,
			//'pesticide_fenhexamid_ppm' => 0,
			'pesticide_fenoxycarb_ppm' => 0,
			'pesticide_fenpyroximate_ppm' => 0,
			'pesticide_fipronil_ppm' => 0,
			'pesticide_flonicamid_ppm' => 0,
			'pesticide_fludioxonil_ppm' => 0,
			'pesticide_hexythiazox_ppm' => 0,
			'pesticide_imazalil_ppm' => 0,
			'pesticide_imidacloprid_ppm' => 0,
			'pesticide_kresoxim_methyl_ppm' => 0,
			'pesticide_malathion_ppm' => 0,
			'pesticide_metalaxyl_ppm' => 0,
			'pesticide_methiocarb_ppm' => 0,
			'pesticide_methomyl_ppm' => 0,
			'pesticide_methyl_parathion_ppm' => 0,
			'pesticide_mgk_264_ppm' => 0,
			'pesticide_myclobutanil_ppm' => 0,
			'pesticide_naled_ppm' => 0,
			'pesticide_oxamyl_ppm' => 0,
			'pesticide_paclobutrazol_ppm' => 0,
			//'pesticide_pcnb_ppm' => 0,
			'pesticide_permethrinsa_ppm' => 0,
			'pesticide_phosmet_ppm' => 0,
			'pesticide_piperonyl_butoxide_b_ppm' => 0,
			'pesticide_piperonyl_butoxide_ppm' => 0,
			'pesticide_prallethrin_ppm' => 0,
			'pesticide_propiconazole_ppm' => 0,
			'pesticide_propoxur_ppm' => 0,
			'pesticide_pyrethrin_ppm' => 0,
			'pesticide_pyrethrinsbc_ppm' => 0,
			'pesticide_pyridaben_ppm' => 0,
			//'pesticide_spinetoram_ppm' => 0,
			'pesticide_spinosad_ppm' => 0,
			'pesticide_spiromesifen_ppm' => 0,
			'pesticide_spirotetramat_ppm' => 0,
			'pesticide_spiroxamine_ppm' => 0,
			'pesticide_tebuconazole_ppm' => 0,
			'pesticide_thiacloprid_ppm' => 0,
			'pesticide_thiamethoxam_ppm' => 0,
			'pesticide_trifloxystrobin_ppm' => 0,

			/**
			 * Solvent
			 */
			'solvent_status' => 'completed',
			'solvent_acetone_ppm' => 0,
			'solvent_benzene_ppm' => 0,
			'solvent_butanes_ppm' => 0,
			'solvent_cyclohexane_ppm' => 0,
			'solvent_chloroform_ppm' => 0,
			'solvent_dichloromethane_ppm' => 0,
			'solvent_ethyl_acetate_ppm' => 0,
			'solvent_heptanes_ppm' => 0,
			'solvent_hexanes_ppm' => 0,
			'solvent_isopropanol_ppm' => 0,
			'solvent_methanol_ppm' => 0,
			'solvent_pentanes_ppm' => 0,
			'solvent_propane_ppm' => 0,
			'solvent_toluene_ppm' => 0,
			'solvent_xylene_ppm' => 0,

		];

		$res = $this->post('lab_results', [ 'lab_result' => $Result ]);
		//echo "\n<<<\n" . $res->getBody()->getContents() . "\n###\n";
		$res = $this->assertValidResponse($res, 200); // Should be 201

		$this->assertIsArray($res);
		$this->assertCount(1, $res);

		$res = $res[0];
		var_dump($res);

		$this->assertIsArray($res);
		// $this->assertCount(69, $res);


		$this->assertEquals('passed', $res['status']);
		$this->assertEquals('completed', $res['testing_status']);
		$this->assertEquals('completed', $res['cannabinoid_status']);
		//$this->assertEquals('completed', $res['']);
		$this->assertNotEmpty($res['global_id']); // "WALWTL.LRUSD"
		//$this->assertEquals(cannabinoid_cbd_percent":12.345000000000001);
		//$this->assertEquals("cannabinoid_cbda_percent":12.345000000000001);
		//$this->assertEquals("cannabinoid_d9_thc_percent":12.345000000000001);
		//$this->assertEquals("cannabinoid_d9_thca_percent":12.345000000000001);
		//$this->assertEquals("global_for_inventory_id":"WAGWT.IN3MJ2");
		//$this->assertEquals("type":"end_product");
		//$this->assertEquals("intermediate_type":"usable_marijuana");
		//$this->assertEquals("retest_eligible":false);
		//$this->assertEquals("extraction_eligible":true);
		//$this->assertEquals("total_cbd":23.172000000000001);
		//$this->assertEquals("total_thc":23.172000000000001);
		//$this->assertEquals("batch_type":"intermediate\/ end product");
		//$this->assertEquals("high_thc":false,"high_cbd":false,"general_use":false);
		$this->assertIsArray($res['inventory']);
		$this->assertEquals($sample_lot_id, $res['inventory']['global_id']); // ":"WALWTL.IN3WPM"
		//$this->assertEquals("global_original_id":"WAGWT.IN3MJ2");

		$this->assertIsArray($res['inventories']); // New
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();
		//$this->assertEquals();

		//exit;
/*
[
"inventories":[{"created_at":"06\/13\/2019 09:49am","updated_at":"07\/22\/2019 03:54pm","external_id":"","released_by_state":null,"lab_retest_id":null,"is_initial_inventory":"0","net_weight":"0.00","inventory_created_at":"","inventory_expires_at":"06\/12\/2020","inventory_packaged_at":"","qty":"-2.0000","packed_qty":null,"cost":"0.00","value":"0.00","source":null,"uom":"ea","total_marijuana_in_grams":"0.00","additives":"","serving_num":"1","serving_size":"0","marijuana_type":null,"sent_for_testing":"1","deleted_at":null,"last_harvest_stage":null,"medically_compliant":"0","global_id":"WAGWT.IN3MJ2","legacy_id":null,"lab_result_file_path":null,"lab_results_attested":"0","lab_results_date":"","global_original_id":null,"propagation_source":"none","retail_to_medical":null,"global_mme_id":"WASTATE1.MM1PC","global_user_id":"WASTATE1.US2GM","global_batch_id":"WAGWT.BA4UHY","global_area_id":"WAGWT.AR19UB","global_lab_result_id":"WALWTL.LRUSD","global_strain_id":"WAGWT.ST1JK6","global_inventory_type_id":"WAGWT.TY54YD","global_created_by_mme_id":null,"area_name":"Clones \/ Fresh Cuttings","inventory_type_name":"Flower - 1g","batch_type":"intermediate\/ end product"},{"created_at":"07\/22\/2019 03:52pm","updated_at":"07\/22\/2019 03:54pm","external_id":"","released_by_state":null,"lab_retest_id":null,"is_initial_inventory":"0","net_weight":"0.00","inventory_created_at":"","inventory_expires_at":"06\/12\/2020","inventory_packaged_at":"07\/22\/2019","qty":"1.0000","packed_qty":null,"cost":"0.00","value":"0.00","source":"","uom":"ea","total_marijuana_in_grams":"0.00","additives":"","serving_num":"1","serving_size":"0","marijuana_type":null,"sent_for_testing":"1","deleted_at":null,"last_harvest_stage":null,"medically_compliant":"0","global_id":"WALWTL.IN3WPM","legacy_id":null,"lab_result_file_path":null,"lab_results_attested":"0","lab_results_date":"","global_original_id":"WAGWT.IN3MJ2","propagation_source":"none","retail_to_medical":null,"global_mme_id":"WASTATE1.MM1PF","global_user_id":"WASTATE1.US2GM","global_batch_id":"WALWTL.BA54F1","global_area_id":"WALWTL.ARAQK","global_lab_result_id":"WALWTL.LRUSD","global_strain_id":null,"global_inventory_type_id":"WALWTL.TY5VC7","global_created_by_mme_id":"WASTATE1.MM1PC","area_name":"Lab Room One","inventory_type_name":"Flower - 1g","batch_type":"intermediate\/ end product"}],"for_inventory":{"created_at":"06\/13\/2019 09:49am","updated_at":"07\/22\/2019 03:54pm","external_id":"","released_by_state":null,"lab_retest_id":null,"is_initial_inventory":"0","net_weight":"0.00","inventory_created_at":"","inventory_expires_at":"06\/12\/2020","inventory_packaged_at":"","qty":"-2.0000","packed_qty":null,"cost":"0.00","value":"0.00","source":null,"uom":"ea","total_marijuana_in_grams":"0.00","additives":"","serving_num":"1","serving_size":"0","marijuana_type":null,"sent_for_testing":"1","deleted_at":null,"last_harvest_stage":null,"medically_compliant":"0","global_id":"WAGWT.IN3MJ2","legacy_id":null,"lab_result_file_path":null,"lab_results_attested":"0","lab_results_date":"","global_original_id":null,"propagation_source":"none","retail_to_medical":null,"global_mme_id":"WASTATE1.MM1PC","global_user_id":"WASTATE1.US2GM","global_batch_id":"WAGWT.BA4UHY","global_area_id":"WAGWT.AR19UB","global_lab_result_id":"WALWTL.LRUSD","global_strain_id":"WAGWT.ST1JK6","global_inventory_type_id":"WAGWT.TY54YD","global_created_by_mme_id":null,"area_name":"Clones \/ Fresh Cuttings","inventory_type_name":"Flower - 1g","batch_type":"intermediate\/ end product","inventory_type":{"created_at":"01\/08\/2019 12:01pm","updated_at":"05\/09\/2019 02:45pm","external_id":"","name":"Flower - 1g","description":"","storage_instructions":"","ingredients":"","type":"end_product","allergens":"","contains":"","used_butane":"0","net_weight":null,"packed_qty":null,"cost":"0.00","value":"0.00","serving_num":1,"serving_size":"0","uom":"ea","total_marijuana_in_grams":"0.000000","total_marijuana_in_mcg":"0","deleted_at":null,"intermediate_type":"usable_marijuana","global_id":"WAGWT.TY54YD","global_original_id":null,"weight_per_unit_in_grams":"1.00","global_mme_id":"WASTATE1.MM1PC","global_user_id":"WASTATE1.US2GM","global_strain_id":null}}}]
*/

		// $LabResult = json_decode($res->getBody()->getContents(), true);
		$UpdatedSample = $this->get(sprintf('/api/v1/inventories?f_global_id=%s', $sample_lot_id));
		var_dump($UpdatedSample);

		$this->assertEquals($UpdatedSample['labResults']['global_id'], $LabResult['global_id']);

	}

}
