<?php
/**
 * Lab Results
 */
namespace Test\Laboratory;

class Lab_Result_Create_Test extends \OpenTHC\Bunk\Test\LeafData_Test
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

		$res = $this->ghc->get('inventories');
		$res = json_decode($res->getBody()->getContents(), true);
		var_dump($res);
		$this->assertEquals($res['total'], count($res['data']));
		// $this->assertEquals($res['from'], 1);
		// $this->assertEquals($res['to'], 1);
		$this->assertEquals($res['per_page'], 2500);
		$this->assertIsArray($res['data']);

		// Find Editable Lab Result
		$rnd_list = [];
		foreach ($res['data'] as $x) {
			if (empty($x['labResults'])) {
				$rnd_list[] = $x;
			}
		}
		$idx = array_rand($rnd_list);
		$Sample = $rnd_list[$idx];
		// print_r(json_encode($Sample));

		// _ksort_r($Result);
		// print_r($Result);

		// $sample_lot_id = getenv('SAMPLE_L0');
		// $this->assertNotEmpty($sample_lot_id, 'Provide a Laboratory Sample ID for this Test');
		// $res = $this->get(sprintf('inventories?f_global_id=%s', $sample_lot_id));
		// $this->assertEquals($res['total'], 1);
		// $this->assertEquals($res['from'], 1);
		// $this->assertEquals($res['to'], 1);
		// $this->assertEquals($res['per_page'], 2500);
		// $this->assertTrue(!empty($res['data']));

		// $Sample = $res['data'][0];
		// $this->assertEquals($sample_lot_id, $Sample['global_id']);
		$this->assertEmpty($Sample['labResults']);
		$this->assertNotEmpty($Sample['global_mme_id']);
		$this->assertNotEmpty($Sample['global_original_id']);

		$Result = [

			'global_inventory_id' => $Sample['global_id'],
			'global_for_mme_id' => $Sample['global_mme_id'],
			'global_for_inventory_id' => $Sample['global_original_id'],

			/**
			 * General
			 */
			'testing_status'                       => 'completed',
			'foreign_matter'                       => '0', // 0 = pass, 1 = fail
			'foreign_matter_seeds'                 => '0', // 0 = pass, 1 = fail
			'foreign_matter_stems'                 => '0', // 0 = pass, 1 = fail
			'moisture_content_percent'             => 12,
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

		$UpdatedSample = $this->get(sprintf('/api/v1/inventories?f_global_id=%s', $sample_lot_id));
		var_dump($UpdatedSample);

		$this->assertEquals($UpdatedSample['labResults']['global_id'], $LabResult['global_id']);

	}

	/**
	 * HM/FL Require:
	 * 1. Moisture Content
	 * 2. Potency Analysis
	 * 3. Foreign Matter Inspection
	 * 4. Microbiological Screening
	 * 5. Mycotoxin Screening
	 */
	public function test_harvest_material_flower_lots()
	{
		$Sample = $this->get_sample('flower_lots');

		$this->assertEmpty($Sample['labResults']);
		$this->assertNotEmpty($Sample['global_mme_id']);
		$this->assertNotEmpty($Sample['global_original_id']);

		$Result = [

			'global_inventory_id' => $Sample['global_id'],
			'global_for_mme_id' => $Sample['global_mme_id'],
			'global_for_inventory_id' => $Sample['global_original_id'],

			/**
			 * Requirement 1
			 */
			'moisture_content_percent'             => 12,
			'moisture_content_water_activity_rate' => 0.12,

			/**
			 * Requirement 2
			 *  _status: optional upon creation of lab result record,
			 *  but required to be "completed" for lab result
			 * 	record to be finalized
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
			 * Requirement 3
			 *  _status: optional upon creation of lab result record,
			 *  but required to be "completed" for lab result
			 * 	record to be finalized
			 */
			'testing_status'                       => 'completed',
			'foreign_matter_seeds'                 => '0', // 0 = pass, 1 = fail
			'foreign_matter_stems'                 => '0', // 0 = pass, 1 = fail
			// 'foreign_matter'                       => '0', // Deprecated

			/**
			 * Requirement 4
			 *  _status: optional upon creation of lab result record,
			 *  but required to be "completed" for lab result
			 * 	record to be finalized
			 */
			'microbial_status' => 'completed',
			'microbial_salmonella_cfu_g' => 0,
			'microbial_bile_tolerant_cfu_g' => 0,

			/**
			 * Requirement 5
			 *  _status: optional upon creation of lab result record,
			 *  but required to be "completed" for lab result
			 * 	record to be finalized
			 */
			'mycotoxin_status' => 'completed',
			'mycotoxin_aflatoxins_ppb' => 0,
			'mycotoxin_ochratoxin_ppb' => 0,
		];

		$res = $this->post('lab_results', [ 'lab_result' => $Result ]);
		$res = $this->assertValidResponse($res, 200); // Should be 201

		$this->assertIsArray($res);
		$this->assertCount(1, $res);

		$res = $res[0];
		var_dump($res);
		$_ENV['Result'] = $res;

		$this->assertIsArray($res);

	}

	/**
	 * Medical Include:
	 * 	- Heavy Metal Screening
	 * 	- Pesticide Testing
	 */
	public function test_harvest_material_flower_lots_medical(){}

	/**
	 * HM/FL Require:
	 * 1. Moisture Content
	 * 2. Potency Analysis
	 * 3. Foreign Matter Inspection
	 * 4. Microbiological Screening
	 * 5. Mycotoxin Screening
	 */
	public function test_intermediate_product_marijuana_mix(){}
	public function test_intermediate_product_marijuana_mix_medical(){}

	/**
	 * 1. Potency Analysis
	 * 2. Mycotoxin Screening*
	 * 3. Residual Solvent Testing
	 */
	public function test_intermediate_product_hydrocarbon_concentrate(){}
	public function test_intermediate_product_hydrocarbon_concentrate_medical(){}

	/**
	 * 1. Potency Analysis
	 * 2. Mycotoxin Screening*
	 * 3. Residual Solvent Testing
	 */
	public function test_intermediate_product_co2_concentrate(){}
	public function test_intermediate_product_co2_concentrate_medical(){}

	/**
	 * 1. Potency Analysis
	 * 2. Mycotoxin Screening*
	 * 3. Residual Solvent Testing
	 */
	public function test_intermediate_product_ethanol_concentrate(){}
	public function test_intermediate_product_ethanol_concentrate_medical(){}

	/**
	 * 1. Potency Analysis
	 * 2. Microbiological Screening*
	 * 3. Mycotoxin Screening*
	 * 4. Residual Solvent Testing
	 */
	public function test_intermediate_product_food_grade_solvent_concentrate(){}
	public function test_intermediate_product_food_grade_solvent_concentrate_medical(){}

	/**
	 * 1. Potency Analysis
	 * 2. Microbiological Screening*
	 * 3. Mycotoxin Screening*
	 */
	public function test_intermediate_product_non_solvent_based_concentrate(){}
	public function test_intermediate_product_non_solvent_based_concentrate_medical(){}

	/**
	 * # Type and SubType Combinations in LD Add. C
	 *
	 * if "type" = "intermediate_product", then:
	 * "marijuana_mix", "nonsolvent_based_concentrate",
	 * "hydrocarbon_concentrate",
	 * "co2_concentrate",
	 * "ethanol_concentrate",
	 * "food_grade_solvent_concentrate",
	 * "infused_cooking_medium";
	 *
	 * if "type" = "end_product", then:
	 * "liquid_edible",
	 * "solid_edible",
	 * "concentrate_for_inhalation", "topical",
	 * "infused_mix",
	 * "packaged_marijuana_mix",
	 * "sample_jar", "usable_marijuana",
	 * "capsules", "tinctures",
	 * "transdermal_patches", "suppositories";
	 *
	 * if "type" = "immature_plant", then:
	 * "seeds", "clones", "plant_tissue";
	 *
	 * if "type" = "mature_plant", then:
	 * "mature_plant",
	 * "non_mandatory_plant_sample";
	 *
	 * if "type" = "harvest_materials", then:
	 * "flower", "other_material", "flower_lots",
	 * "other_material_lots";
	 *
	 * if "type" = "waste", then:
	 * "waste"
	 */
	private function get_sample($inventory_type = null)
	{
		if (empty($inventory_type)) {
			$res = $this->get('inventories');
		} else {
			$res = $this->get('inventories?f_type' . $inventory_type);
		}

		$this->assertEquals($res['total'], count($res['data']));
		// $this->assertEquals($res['from'], 1);
		// $this->assertEquals($res['to'], 1);
		$this->assertEquals($res['per_page'], 2500);
		$this->assertIsArray($res['data']);

		// Find Editable Lab Result
		$rnd_list = [];
		foreach ($res['data'] as $x) {
			$type_res = $this->get('inventory_types?f_global_id=' . $x['global_inventory_type_id']);
			$this->assertEquals($type_res['total'], count($type_res['data']));
			$this->assertEquals(1, count($type_res['data']));

			// if IT is empty, or if IT and found IT do not match, skip.
			if (empty($inventory_type) || $inventory_type !== $type_res[0]['intermediate_type']) {
				continue;
			}

			if (empty($x['labResults'])) {
				$rnd_list[] = $x;
			}
		}
		$idx = array_rand($rnd_list);
		$Sample = $rnd_list[$idx];
		print_r(json_encode($Sample));
		return $Sample;
	}
}
