<?php
/**
 * Library of Shit for the mock BioTrack API
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\BioTrack;

class Base
{
	public static $obj_list = array(
		'vendor' => 'Vendor',
		'qa_lab' => 'QA Lab',
		'third_party_transporter' => 'Third Party Transporter',
		'employee' => 'Employee',
		'vehicle' => 'Vehicle',
		'inventory_room' => 'Room/Inventory',
		'plant_room' => 'Room/Plant',
		'inventory' => 'Inventory',
		'plant' => 'Plant',
		'plant_derivative' => 'Plant Derivative',
		'manifest' => 'Manifest',
		'inventory_transfer' => 'Inventory Transfer - Outbound',
		'inventory_transfer_inbound' => 'Inventory Transfer - Inbound',
		'inventory_sample' => 'Inventory Sample',
		'inventory_qa_sample' => 'QA Sample',
		'inventory_adjust' => 'Inventory Adjustment',
		'sale' => 'Sale',
		'tax_report' => 'Tax Reporting',
		'id_preassign' => 'IDs',
	);

	/**
	 * Generate a 16 Digit GUID
	 */
	static function _rnd_barcode($k=null) : string
	{
		if (empty($k)) $k = '0000';
		return "9999{$k}00" . sprintf('%06d', mt_rand(1, 9999));
	}

	/**
	 * Generate a Random Inventory Type
	 */
	static function _rnd_inventory_type() : string
	{
		$product_type_list = [];
		$product_type_list = array_keys($product_type_list);
		$product_type_list = array_rand($product_type_list);
		return $product_type_list[$idx];
	}

	/**
	 * Pick one of the well-known license at random
	 */
	static function _rnd_license() : string
	{
		$license_list = array(
			'100111111',
			'200222222',
			'300333333',
			'400444444',
			'500555555',
			'600666666',
			'700777777',
			'800888888',
			'900999999',
		);
		$idx = array_rand($license_list);
		return $license_list[$idx];
	}

	/**
	 *
	 */
	static function _rnd_product_name() : string
	{
		$product_list = array(
			'BTMRND: Matanuska TF',
			'BTMRND: Trainwreck',
			'BTMRND: Granberry Skunkhound',
			'BTMRND: Barack O Bubba',
			'BTMRND: Bluesnow Yum-Yum',
			'BTMRND: Pineapple Rhino',
			'BTMRND: Dankenstein',
			'BTMRND: Blue Dragon',
			'BTMRND: Plunkbottom Sourc Diesel',
			'BTMRND: Strawberry Stankness',
		);

		$idx = array_rand($product_list);

		return $product_list[$idx];
	}

	/**
	 *
	 */
	static function _rnd_transaction_id() : string
	{
		static $i = 0;
		$i++;
		$t = $_SERVER['REQUEST_TIME_FLOAT'] ?: $_SERVER['REQUEST_TIME'] ?: time();
		return floor($t / 10) + $i;
	}

}
