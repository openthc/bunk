<?php
/**
 * Lab Results
 */

namespace Laboratory;

class Lab_Result_Update extends \OpenTHC_Bunk_LeafData_Test
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
	public function test_update_lab_result()
	{
		// Have to find a Sample First

		// Get the Sample
		// $res = $this->get(sprintf('inventories?f_global_id=%s', $Result['global_for_inventory_id']));
		$res = $this->get(sprintf('inventories?f_global_id=%s', 'WALWTL.IN3UBM')); // $Result['global_for_inventory_id']));
		// var_dump($res);
		$this->assertEquals($res['total'], 1);
		$this->assertEquals($res['from'], 1);
		$this->assertEquals($res['to'], 1);
		$this->assertEquals($res['per_page'], 2500);
		$this->assertTrue(!empty($res['data']));

		$Sample = $res['data'][0];
		// $this->assertEquals($sample_lot_id, $Sample['global_id']);
		$this->assertNotEmpty($Sample['global_mme_id']);
		$this->assertNotEmpty($Sample['global_original_id']);
		$this->assertIsArray($Sample['labResults']);

		// _ksort_r($Sample);
		// print_r($Sample);
		// exit;

		// $res = $this->ghc->get('lab_results?f_date1=2017-07-01');
		$res = $this->ghc->get('lab_results?f_global_id=' . $Sample['labResults'][0]['global_id']);
		$res = $this->assertValidResponse($res);
		$this->assertIsArray($res);
		$this->assertIsArray($res['data']);

		$Result = $res['data'][0];

		$mod = [

			'global_id' => $Result['global_id'],
			'global_inventory_id' => $Sample['global_id'],
			'global_for_mme_id' => $Sample['global_mme_id'],
			'global_for_inventory_id' => $Sample['global_original_id'],
			// 'global_for_inventory_id' => $Result['global_for_inventory_id'],
			// 'global_for_mme_id' => $Result['for_inventory']['global_mme_id'],
			'intermediate_type' => $Result['intermediate_type'],
			// 'global_inventory_id' => $Sample['global_id'],
			// 'global_for_mme_id' => $Sample['global_mme_id'],
			// 'global_for_inventory_id' => $Sample['global_original_id'],

			/**
			 * General
			 */
			'testing_status'                       => 'completed',
			'foreign_matter'                       => '0', // 0 == Pass, 1 == Fail
			'foreign_matter_seeds'                 => '0', // 0 == Pass, 1 == Fail
			'foreign_matter_stems'                 => '0', // 0 == Pass, 1 == Fail
			'moisture_content_percent'             => 13,
			'moisture_content_water_activity_rate' => 0.13,


			/**
			 * Cannabinoid
			 */
			'cannabinoid_status' => 'completed',
			'cannabinoid_cbc_mg_g'        => 23.456,
			'cannabinoid_cbc_percent'     => 23.456,
			'cannabinoid_cbd_mg_g'        => 23.456,
			'cannabinoid_cbd_percent'     => 23.456,
			'cannabinoid_cbda_mg_g'       => 23.456,
			'cannabinoid_cbda_percent'    => 23.456,
			'cannabinoid_cbdv_mg_g'       => 23.456,
			'cannabinoid_cbdv_percent'    => 23.456,
			'cannabinoid_cbg_mg_g'        => 23.456,
			'cannabinoid_cbg_percent'     => 23.456,
			'cannabinoid_cbga_mg_g'       => 23.456,
			'cannabinoid_cbga_percent'    => 23.456,
			'cannabinoid_cbn_mg_g'        => 23.456,
			'cannabinoid_cbn_percent'     => 23.456,
			'cannabinoid_d8_thc_mg_g'     => 23.456,
			'cannabinoid_d8_thc_percent'  => 23.456,
			'cannabinoid_d9_thc_mg_g'     => 23.456,
			'cannabinoid_d9_thc_percent'  => 23.456,
			'cannabinoid_d9_thca_mg_g'    => 23.456,
			'cannabinoid_d9_thca_percent' => 23.456,
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
			'microbial_pathogenic_e_coli_cfu_g' => 0,

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
			// 'pesticide_fenhexamid_ppm' => 0,
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
			// 'pesticide_pcnb_ppm' => 0,
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
			// 'pesticide_spinetoram_ppm' => 0,
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

		// print_r($mod);

		$res = $this->post('lab_results/update', [ 'lab_result' => $mod ]);
		$res = $this->assertValidResponse($res, 200, __METHOD__ . __LINE__);

		$this->assertIsArray($res);
		$this->assertCount(211, $res);

		$this->assertEquals('passed', $res['status']);
		$this->assertEquals('completed', $res['testing_status']);
		$this->assertEquals('completed', $res['cannabinoid_status']);
		//$this->assertEquals('completed', $res['']);
		$this->assertNotEmpty($res['global_id']);
		//$this->assertEquals(cannabinoid_cbd_percent":23.456000000000001);
		//$this->assertEquals("cannabinoid_cbda_percent":23.456000000000001);
		//$this->assertEquals("cannabinoid_d9_thc_percent":23.456000000000001);
		//$this->assertEquals("cannabinoid_d9_thca_percent":23.456000000000001);
		//$this->assertEquals("global_for_inventory_id":"xxxxx");
		//$this->assertEquals("type":"end_product");
		//$this->assertEquals("intermediate_type":"usable_marijuana");
		//$this->assertEquals("retest_eligible":false);
		//$this->assertEquals("extraction_eligible":true);
		//$this->assertEquals("total_cbd":23.172000000000001);
		//$this->assertEquals("total_thc":23.172000000000001);
		//$this->assertEquals("batch_type":"intermediate\/ end product");
		//$this->assertEquals("high_thc":false,"high_cbd":false,"general_use":false);
		$this->assertIsArray($res['inventory']);

		// $this->assertIsArray($res['inventories']); // New

		// $UpdatedSample = $this->get(sprintf('/api/v1/inventories?f_global_id=%s', $sample_lot_id));
		// var_dump($UpdatedSample);

		// $this->assertEquals($UpdatedSample['labResults']['global_id'], $LabResult['global_id']);

	}

}
