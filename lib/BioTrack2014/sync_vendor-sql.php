<?php
/**
 * Sync Vendor
 */

use Edoceo\Radix\DB\SQL;

$sql = 'SELECT company.guid AS company_guid';
$sql.= ', license.guid AS license_guid';
$sql.= ', license.name AS license_name';
$sql.= ', license.kind AS license_kind';
$sql.= ', license.meta AS license_meta';
$sql.= ', license.created_at';
$sql.= ', license.updated_at';

$sql.= ' FROM company JOIN license ON company.id = license.company_id';
$sql.= ' WHERE ';
$sql.= ' (company.guid IS NOT NULL AND length(company.guid) > 0)';
$sql.= ' AND company.cre = :cre';
$sql.= ' AND license.flag & :flag_0 = 0';

$arg = array(
	':cre' => 'usa/wa',
	':flag_0' => License::FLAG_DEAD,
);

$res_license = SQL::fetch_all($sql, $arg);

foreach ($res_license as $rec) {

	$meta = json_decode($rec['license_meta'], true);
	if (empty($meta)) {
		$meta = array();
	}
	// Core Data has this dumb-shit where address1 is already contained in address1

	$addr = $meta['address1'];
	if (false === strpos($addr, $meta['address2'])) {
		$addr.= ' ' . $meta['address2'];
		$meta['address2'] = null;
	}

	if (empty($meta['locationtype'])) {
		$meta['locationtype'] = 1;
		$meta['producer'] = 1;
	}

	$ret['vendor'][] = array(
		'ubi' => $rec['company_guid'],
		'location' => $rec['license_guid'],
		'name' => $rec['license_name'],
		//'_license_type' => $rec['license_type'],
		'locationtype' => $meta['locationtype'],
		'address1' => $meta['address1'],
		'address2' => $meta['address2'],
		'city' => $meta['city'],
		'state' => $meta['state'],
		'zip' => $meta['zip'],
		'processor' => intval($meta['processor']),
		'producer' => intval($meta['producer']),
		'retail' => intval($meta['retail']),
		'deleted' => intval($meta['deleted']),
		'medical' => intval($meta['medical']),
		'transactionid' => strtotime($rec['ts_updated']),
		'transactionid_original' => strtotime($rec['ts_created']),
	);

}

return $RES->withJSON($ret);
