<?php
/**
 * TEST Bunk Configuration
 */

$cfg = [];

$cfg['openthc'] = [];
$cfg['openthc']['bunk'] = [
	'origin' => 'https://bunk.openthc.example.com',
	'public' => '/* BUNK SERVICE PUBLIC KEY */',
	'secret' => '/* BUNK SERVICE SECRET KEY */',
];

// BioTrack Configuration Options
$cfg['biotrack'] = [
	'v2014' => [],
	'v2021' => [],
	'v2022' => [],
];

// BioTrack Configuration Options
$cfg['metrc'] = [
	'v2015' => [],
	'v2022' => [],
];

return $cfg;
