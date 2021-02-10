<?php
/**
 * Generate Fake Lab Results for LeafData
 */

use OpenTHC\Bunk\Module\LeafData;

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':

		$min = mt_rand(1000, 9999);
		$max = 10;

		$ret = array(
			'total' => $max,
			'per_page' => 2500, // always
			'current_page' => 1,
			'last_page' => 1,
			'next_page_url' => null,
			'prev_page_url' => null,
			'from' => 1,
			'to' => $max,
			'data' => array(),
		);

		for ($idx = 0; $idx < $max; $idx++) {

			$oid = LeafData::generateId($min + $idx);

			$ret['data'][] = array(
				'global_id' => sprintf('LDTEST1.LR%s', $oid),
				'created_at' => date('m/d/Y g:ia'),
				"deleted_at" => null,
<<<<<<< HEAD
				"updated_at" => date('m/d/Y g:ia'),
				"id" => 26853,
				"created_at" => date('m/d/Y g:ia'),
				"updated_at" => date('m/d/Y g:ia'),
=======
				"updated_at" => "02\/01\/2018 03:00pm",
				"id" => 26853,
				"created_at" => "09/25/2018 11:01am",
				"updated_at" => "09/25/2018 11:01am",
>>>>>>> fake responses
				"deleted_at" => null,
				"mme_id" => "2425",
				"lab1_mme_id" => null,
				"lab2_mme_id" => null,
				"user_id" => "4",
				"external_id" => "retest LW2702",
				"status" => "failed",
				"testing_status" => "completed",
				"extraction_eligible" => "0",
				"retest_eligible" => "0",
				"pdf_path" => "",
				"batch_id" => "39170",
				"inventory_id" => "344282",
				"for_mme_id" => "2423",
				"parent_lab_result_id" => "0",
				"og_parent_lab_result_id" => "0",
				"copied_from_lab_id" => null,
				"lab_user_id" => "4",
				"tested_at" => "",
				"received_at" => "0000-00-00 00:00:00",
				"type" => "intermediate_product",
				"foreign_matter" => "0",
				"moisture_content_percent" => null,
				"herbicides_ppm" => null,
				"growth_regulators_ppm" => null,
				"cannabinoid_status" => "completed",
				"cannabinoid_editor" => "0",
				"cannabinoid_editor_mme_id" => null,
				"cannabinoid_d9_thca_percent" => "0.000",
				"cannabinoid_d9_thca_mg_g" => "0.000",
				"cannabinoid_d9_thc_percent" => "0.000",
				"cannabinoid_d9_thc_mg_g" => "0.000",
				"cannabinoid_d8_thc_percent" => null,
				"cannabinoid_d8_thc_mg_g" => null,
				"cannabinoid_thcv_percent" => null,
				"cannabinoid_thcv_mg_g" => null,
				"cannabinoid_cbd_percent" => "0.000",
				"cannabinoid_cbd_mg_g" => "0.000",
				"cannabinoid_cbda_percent" => "0.000",
				"cannabinoid_cbda_mg_g" => "0.000",
				"cannabinoid_cbdv_percent" => null,
				"cannabinoid_cbdv_mg_g" => null,
				"cannabinoid_cbg_percent" => null,
				"cannabinoid_cbg_mg_g" => null,
				"cannabinoid_cbga_percent" => null,
				"cannabinoid_cbga_mg_g" => null,
				"cannabinoid_cbc_percent" => null,
				"cannabinoid_cbc_mg_g" => null,
				"cannabinoid_cbn_percent" => null,
				"cannabinoid_cbn_mg_g" => null,
				"terpenoid_status" => null,
				"terpenoid_editor" => null,
				"terpenoid_editor_mme_id" => null,
				"terpenoid_bisabolol_percent" => null,
				"terpenoid_bisabolol_mg_g" => null,
				"terpenoid_humulene_percent" => null,
				"terpenoid_humulene_mg_g" => null,
				"terpenoid_pinene_percent" => null,
				"terpenoid_pinene_mg_g" => null,
				"terpenoid_terpinolene_percent" => null,
				"terpenoid_terpinolene_mg_g" => null,
				"terpenoid_b_caryophyllene_percent" => null,
				"terpenoid_b_caryophyllene_mg_g" => null,
				"terpenoid_b_myrcene_percent" => null,
				"terpenoid_b_myrcene_mg_g" => null,
				"terpenoid_b_pinene_percent" => null,
				"terpenoid_b_pinene_mg_g" => null,
				"terpenoid_caryophyllene_oxide_percent" => null,
				"terpenoid_caryophyllene_oxide_mg_g" => null,
				"terpenoid_limonene_percent" => null,
				"terpenoid_limonene_mg_g" => null,
				"terpenoid_linalool_percent" => null,
				"terpenoid_linalool_mg_g" => null,
				"microbial_status" => "completed",
				"microbial_editor" => "0",
				"microbial_editor_mme_id" => null,
				"microbial_total_viable_plate_count_cfu_g" => null,
				"microbial_total_yeast_mold_cfu_g" => null,
				"microbial_total_coliform_cfu_g" => null,
				"microbial_bile_tolerant_cfu_g" => "1000.000",
				"microbial_pathogenic_e_coli_cfu_g" => "0.001",
				"microbial_salmonella_cfu_g" => "0.001",
				"microbial_aerobic_bacteria_cfu_g" => null,
				"mycotoxin_status" => "completed",
				"mycotoxin_editor" => "0",
				"mycotoxin_editor_mme_id" => null,
				"mycotoxin_aflatoxins_ppb" => "20.000",
				"mycotoxin_ochratoxin_ppb" => "20.000",
				"metal_status" => null,
				"metal_editor" => null,
				"metal_editor_mme_id" => null,
				"metal_arsenic_ppm" => null,
				"metal_cadmium_ppm" => null,
				"metal_lead_ppm" => null,
				"metal_mercury_ppm" => null,
				"pesticide_status" => null,
				"pesticide_editor" => null,
				"pesticide_editor_mme_id" => null,
				"pesticide_abamectin_ppm" => null,
				"pesticide_acequinocyl_ppm" => null,
				"pesticide_bifenazate_ppm" => null,
				"pesticide_bifentrin_ppm" => null,
				"pesticide_captan_ppm" => null,
				"pesticide_cyfluthrin_ppm" => null,
				"pesticide_cypermethrin_ppm" => null,
				"pesticide_dimethomorph_ppm" => null,
				"pesticide_etoxazole_ppm" => null,
				"pesticide_fenhexamid_ppm" => null,
				"pesticide_flonicamid_ppm" => null,
				"pesticide_fludioxonil_ppm" => null,
				"pesticide_imidacloprid_ppm" => null,
				"pesticide_myclobutanil_ppm" => null,
				"pesticide_pcnb_ppm" => null,
				"pesticide_piperonyl_butoxide_ppm" => null,
				"pesticide_pyrethrin_ppm" => null,
				"pesticide_spinetoram_ppm" => null,
				"pesticide_spinosad_ppm" => null,
				"pesticide_spirotetramet_ppm" => null,
				"pesticide_thiamethoxam_ppm" => null,
				"pesticide_trifloxystrobin_ppm" => null,
				"solvent_status" => "completed",
				"solvent_editor" => "0",
				"solvent_editor_mme_id" => null,
				"solvent_butanes_ppm" => "5000.000",
				"solvent_heptane_ppm" => null,
				"solvent_propane_ppm" => "5000.000",
				"notes" => "",
				"thc_percent" => null,
				"global_id" => "WAL400004.LRKPX",
				"intermediate_type" => "non-solvent_based_concentrate",
				"moisture_content_water_activity_rate" => null,
				"solvent_acetone_ppm" => "5000.000",
				"solvent_benzene_ppm" => "2.000",
				"solvent_cyclohexane_ppm" => "3880.000",
				"solvent_chloroform_ppm" => "2.000",
				"solvent_dichloromethane_ppm" => "600.000",
				"solvent_ethyl_acetate_ppm" => "5000.000",
				"solvent_hexanes_ppm" => "290.000",
				"solvent_isopropanol_ppm" => "5000.000",
				"solvent_methanol_ppm" => "3000.000",
				"solvent_pentanes_ppm" => "5000.000",
				"solvent_toluene_ppm" => "890.000",
				"solvent_xylene_ppm" => "2170.000",
				"solvent_heptanes_ppm" => "5000.000",
				"pesticide_acephate_ppm" => null,
				"pesticide_acetamiprid_ppm" => null,
				"pesticide_aldicarb_ppm" => null,
				"pesticide_azoxystrobin_ppm" => null,
				"pesticide_bifenthrin_ppm" => null,
				"pesticide_boscalid_ppm" => null,
				"pesticide_carbaryl_ppm" => null,
				"pesticide_carbofuran_ppm" => null,
				"pesticide_chlorantraniliprole_ppm" => null,
				"pesticide_chlorfenapyr_ppm" => null,
				"pesticide_chlorpyrifos_ppm" => null,
				"pesticide_clofentezine_ppm" => null,
				"pesticide_daminozide_ppm" => null,
				"pesticide_ddvp_dichlorvos_ppm" => null,
				"pesticide_diazinon_ppm" => null,
				"pesticide_dimethoate_ppm" => null,
				"pesticide_ethoprophos_ppm" => null,
				"pesticide_etofenprox_ppm" => null,
				"pesticide_fenoxycarb_ppm" => null,
				"pesticide_fenpyroximate_ppm" => null,
				"pesticide_fipronil_ppm" => null,
				"pesticide_hexythiazox_ppm" => null,
				"pesticide_imazalil_ppm" => null,
				"pesticide_kresoxim_methyl_ppm" => null,
				"pesticide_malathion_ppm" => null,
				"pesticide_methiocarb_ppm" => null,
				"pesticide_methomyl_ppm" => null,
				"pesticide_methyl_parathion_ppm" => null,
				"pesticide_mgk_264_ppm" => null,
				"pesticide_naled_ppm" => null,
				"pesticide_oxamyl_ppm" => null,
				"pesticide_paclobutrazol_ppm" => null,
				"pesticide_permethrinsa_ppm" => null,
				"pesticide_phosmet_ppm" => null,
				"pesticide_piperonyl_butoxide_b_ppm" => null,
				"pesticide_prallethrin_ppm" => null,
				"pesticide_propiconazole_ppm" => null,
				"pesticide_propoxur_ppm" => null,
				"pesticide_pyrethrinsbc_ppm" => null,
				"pesticide_pyridaben_ppm" => null,
				"pesticide_spiromesifen_ppm" => null,
				"pesticide_spirotetramat_ppm" => null,
				"pesticide_spiroxamine_ppm" => null,
				"pesticide_tebuconazole_ppm" => null,
				"pesticide_thiacloprid_ppm" => null,
				"foreign_matter_stems" => "0",
				"foreign_matter_seeds" => "0",
				"test_for_terpenes" => "0",
				"global_for_inventory_id" => "WAM200002.IN7DNC",
				"for_inventory_id" => "344280",
				"high_thc_flag" => "0",
				"high_cbd_flag" => "0",
				"pesticide_metalaxyl_ppm" => null,
				"moisture_status" => null,
				"foreign_status" => null,
				"batch_type" => "extraction",
				"global_mme_id" => "WAWA1.MM1VD",
				"global_user_id" => "WAWA1.US4",
				"global_for_mme_id" => "WAWA1.MM1VB",
				"global_inventory_id" => "WAL400004.IN7DNE",
				"global_batch_id" => "WAL400004.BAU82",
				"strain_name" => "",
				"high_thc" => false,
				"high_cbd" => true,
				"general_use" => false,
				"inventory" => [
<<<<<<< HEAD
					"created_at" => date('m/d/Y g:ia'),
					"updated_at" => date('m/d/Y g:ia'),
=======
					"created_at" => "09/25/2018 10:50am",
					"updated_at" => "09/25/2018 11:01am",
>>>>>>> fake responses
					"external_id" => "",
					"released_by_state" => null,
					"lab_retest_id" => null,
					"is_initial_inventory" => "0",
					"net_weight" => "0.00",
					"inventory_created_at" => "",
					"inventory_expires_at" => "",
<<<<<<< HEAD
					"inventory_packaged_at" => date('m/d/Y g:ia'),
=======
					"inventory_packaged_at" => "09/25/2018",
>>>>>>> fake responses
					"qty" => "5.0000",
					"packed_qty" => null,
					"cost" => "0.00",
					"value" => "0.00",
					"source" => "",
					"uom" => "gm",
					"total_marijuana_in_grams" => "0.00",
					"additives" => "",
					"serving_num" => "1",
					"serving_size" => "0",
					"marijuana_type" => null,
					"sent_for_testing" => "1",
					"deleted_at" => null,
					"last_harvest_stage" => null,
					"medically_compliant" => "0",
					"global_id" => "WAL400004.IN7DNE",
					"legacy_id" => null,
					"lab_result_file_path" => null,
					"lab_results_attested" => "0",
					"lab_results_date" => null,
					"global_original_id" => "WAM200002.IN7DNC",
					"propagation_source" => "none",
					"global_mme_id" => "WAWA1.MM1VD",
					"global_user_id" => "WAWA1.US4",
					"global_batch_id" => "WAL400004.BAU82",
					"global_area_id" => "WAL400004.ARHEI",
					"global_lab_result_id" => "WAL400004.LRKPX",
					"global_strain_id" => null,
					"global_inventory_type_id" => "WAL400004.TYIGS",
					"global_created_by_mme_id" => "WAWA1.MM1VB",
				],
				"inventory_type" => [
<<<<<<< HEAD
					"created_at" => date('m/d/Y g:ia'),
					"updated_at" => date('m/d/Y g:ia'),
=======
					"created_at" => "09/25/2018 10:50am",
					"updated_at" => "09/25/2018 10:50am",
>>>>>>> fake responses
					"external_id" => "",
					"name" => "White Widow Bubble Hash",
					"description" => "",
					"storage_instructions" => "",
					"ingredients" => "",
					"type" => "intermediate_product",
					"allergens" => "",
					"contains" => "",
					"used_butane" => "0",
					"net_weight" => "",
					"packed_qty" => null,
					"cost" => "0.00",
					"value" => "0.00",
					"serving_num" => 1,
					"serving_size" => "0",
					"uom" => "gm",
					"total_marijuana_in_grams" => "0.000000",
					"total_marijuana_in_mcg" => "0",
					"deleted_at" => null,
					"intermediate_type" => "non-solvent_based_concentrate",
					"global_id" => "WAL400004.TYIGS",
					"global_original_id" => "23930",
					"weight_per_unit_in_grams" => "0.00",
					"global_mme_id" => "WAWA1.MM1VD",
					"global_user_id" => "WAWA1.US4",
					"global_strain_id" => null
				],
				"for_inventory" => [
					"id" => 344280,
<<<<<<< HEAD
					"created_at" => date('m/d/Y g:ia'),
					"updated_at" => date('m/d/Y g:ia'),
=======
					"created_at" => "09/25/2018 10:48am",
					"updated_at" => "09/25/2018 11:01am",
>>>>>>> fake responses
					"mme_id" => "2423",
					"user_id" => "4",
					"external_id" => "",
					"area_id" => "22539",
					"batch_id" => "39169",
					"lab_result_id" => "26853",
					"released_by_state" => null,
					"lab_retest_id" => null,
					"is_initial_inventory" => "0",
					"net_weight" => "0.00",
					"inventory_created_at" => "",
					"inventory_expires_at" => "",
					"inventory_packaged_at" => "",
					"created_by_mme_id" => "0",
					"qty" => "140.0000",
					"packed_qty" => null,
					"cost" => "0.00",
					"value" => "0.00",
					"source" => null,
					"uom" => "gm",
					"strain_id" => "9167",
					"total_marijuana_in_grams" => "0.00",
					"inventory_type_id" => "23930",
					"additives" => "",
					"serving_num" => "1",
					"serving_size" => "0",
					"marijuana_type" => null,
					"sent_for_testing" => "1",
					"deleted_at" => null,
					"last_harvest_stage" => null,
					"medically_compliant" => "0",
					"global_id" => "WAM200002.IN7DNC",
					"legacy_id" => null,
					"lab_result_file_path" => null,
					"lab_results_attested" => "0",
					"lab_results_date" => "",
					"global_original_id" => null,
					"propagation_source" => "none",
					"inventory_type" => [
<<<<<<< HEAD
						"created_at" => date('m/d/Y g:ia'),
						"updated_at" => date('m/d/Y g:ia'),
=======
						"created_at" => "09/25/2018 10:47am",
						"updated_at" => "09/25/2018 10:47am",
>>>>>>> fake responses
						"external_id" => "",
						"name" => "White Widow Bubble Hash",
						"description" => "",
						"storage_instructions" => "",
						"ingredients" => "",
						"type" => "intermediate_product",
						"allergens" => "",
						"contains" => "",
						"used_butane" => "0",
						"net_weight" => "",
						"packed_qty" => null,
						"cost" => "0.00",
						"value" => "0.00",
						"serving_num" => 1,
						"serving_size" => "0",
						"uom" => "gm",
						"total_marijuana_in_grams" => "0.000000",
						"total_marijuana_in_mcg" => null,
						"deleted_at" => null,
						"intermediate_type" => "non-solvent_based_concentrate",
						"global_id" => "WAM200002.TYIGQ",
						"global_original_id" => null,
						"weight_per_unit_in_grams" => "0.00",
						"global_mme_id" => "WAWA1.MM1VB",
						"global_user_id" => "WAWA1.US4",
						"global_strain_id" => null
					]
				]
			);

		}

		return $RES->withJSON($ret);
	case 'POST':
	case 'DELETE':
		return $RES->write("");
		break;
}
