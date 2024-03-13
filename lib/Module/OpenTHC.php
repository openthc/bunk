<?php
/**
	API Group Controller
*/

namespace OpenTHC\Bunk\Module;

class OpenTHC extends \OpenTHC\Module\Base
{
	/**
		@param $a Slim Application
	*/
	function __invoke($a)
	{
		////////////////
		// Authentication
		$app->group('/v2016/auth', function() {

			$this->get('', function($REQ, $RES, $ARG) {
				require_once(APP_ROOT . '/module/v2016/auth.php');
				return $RES;
			});

			$this->post('', function($REQ, $RES, $ARG) {
				//$res = $res->withHeader('Content-Type', 'application/json');
				//require_once(APP_ROOT . '/module/v2016/auth.php');
				return $RES->withJson(array(
					'status' => 'success',
					'detail' => $_POST['username'] . ' authenticated',
					'result' => array(
						'token' => sha1(json_encode($_POST)) . '-' . sha1(json_encode($_SERVER)),
					)
				));
			});

		});

		// Account

		// Company
		$app->group('/v2016/company', function() {

			// GET default
			$this->get('', function($req, $res, $arg) {

				// Params 'id' and 'q' and 'type'
				if (!empty($_GET['id'])) {
					// Single
				}

				if (!empty($_GET['guid'])) {

					$sql = 'SELECT id, flag, type, name FROM company';
					$sql.= ' WHERE ';
					$sql.= ' guid = :guid';

					$arg = array(':guid' => $_GET['guid']);

					$res = SQL::fetch_all($sql, $arg);

					return $RES->withJSON(array(
						'status' => 'success',
						'result' => $res,
					));

				}

				if (!empty($_GET['q'])) {
					$sql = 'SELECT id, flag, type, name FROM company';
					$sql.= ' WHERE ';
					//$sql.= ' cre = ?';
				}

				return $res->withJson(array(
					'ulid' => '123456789',
					'name' => 'Example',
					// Other Details
				));

			});

			$this->get('/search', function($REQ, $RES, $ARG) {
				// Do a Search
				$RES = require_once(APP_ROOT . '/module/v2016/company/search.php');
				return $RES;
			});

			//->add(function($req, $res, $ncb) {
			//	$res->write("one-alpha\n");
			//	$res = $ncb($req, $res);
			//	$res->write("one-omega\n");
			//	return $res;
			//})->add(function($req, $res, $ncb) {
			//	$res->write("two-alpha\n");
			//	$res = $ncb($req, $res);
			//	$res->write("two-omega\n");
			//	return $res;
			//});

			$this->post('/{ulid:[0-9a-f]+}/', function($req, $res, $arg) {
				return $res;
			})->add('App\Middleware\Auth');

			$this->post('/update', function($req, $res, $arg) {
				require_once(APP_ROOT . '/module/v2016/company/update.php');
				return $res;
			})->add('App\Middleware\Auth');

		});

		// License
		$app->group('/v2016/license', function() {

			// Array of Licenses
			$this->get('', function($req, $res, $arg) {
				return $res->withJson(array(
					'guid' => '123456789',
					'name' => 'Example',
				));
			});

			$this->post('', function($REQ, $RES, $ARG) {
				if ('reload' == $_POST['action']) {
					$cmd = array();
					$cmd[] = '/opt/directory.openthc.com/bin/import.sh';
					$cmd[] = '2>&1';
					$cmd = implode(' ', $cmd);
					$buf = shell_exec($cmd);
				}
				return $res->withJSON(array(
					'status' => 'success',
				));
			})->add(new MiddlewareAuth());

			$this->post('/{guid:[\w\.]+}', function($REQ, $RES, $ARG) {

			})->add(new MiddlewareAuth());

		});

		// Contact
		$app->group('/v2016/contact', function() {

			$this->get('', function($req, $res, $arg) {
				return $res->withJson(array(
					'guid' => '123456789',
					'name' => 'Example',
				));
			});

			$this->post('', function($REQ, $RES, $ARG) {
				//require_once(APP_ROOT . '/module/v2016/contact/create.php');
				return $RES;
			});

			$this->post('/{guid:[\w\.]+}/', function($REQ, $RES, $ARG) {
				//require_once(APP_ROOT . '/module/v2016/contact/update.php');
				return $RES;
			});

		})->add($MWA);

		// Inventory
		$app->group('/v2016/inventory', function() {

			$this->get('', function($req, $res, $arg) {
				$ret = array();
				$ret[] = array(
					'guid' => '1234',
					'kind' => 'Flower/Dry',
					'strain' => array(
						'name' => 'Blue Dream',
					),
					'unit' => array(
						'kind' => 'weight',
						'value' => '1234.5',
						'uom' => 'g',
					),
					'zone' => array(
						'id' => '1234',
						'name' => 'Example Zone',
					),
					'created_ts' => '2017-01-01',
					'updated_ts' => '2017-01-03',
				);

				$ret[] = array(
					'guid' => '1235',
					'kind' => 'Flower/Package',
					'strain' => array(
						'name' => 'Blue Dream',
					),
					'unit' => array(
						'kind' => 'pack',
						'quantity' => 50,
						'weight' => 1,
						'uom' => 'g',
					),
					'zone' => array(
						'id' => '1234',
						'name' => 'Example Zone',
					),
					'created_ts' => '2017-01-01',
					'updated_ts' => '2017-01-03',
				);

				return $res->withJson($ret);

			});

			$this->post('/', function($req, $res, $arg) {
				die('Create Inventory');
			});

			// Combine Inventory to a new Type
			$this->post('/combine', function($req, $res, $arg) {
				return $res->withJson(array(
					'guid' => ULID::generate(), // '1234567890123456',
					'weight' => 123.45,
					'weight_unit' => 'g',
					'quantity' => 1,
				));
			});

			// Convert Inventory to a new Type
			$this->post('/convert', function($req, $res, $arg) {
				return $res->withJson(array(
					'guid' => '123456',
					'weight' => '',
					'weight_unit' => 123.45,
					'quantity' => 1,
				));
			})->add(function($req, $res) {
				// Enfore Type => Type Rules
				//die(print_r($_POST));
			});

			// View Item
			$this->get('/{guid:[\w\.]+}', function($req, $res, $arg) {
				return $res->withJson(array(
					'guid' => $arg['guid'],
					'kind' => 'Flower/Dry',
					'strain' => array(
						'name' => 'Blue Dream',
					),
					'unit' => array(
						'kind' => 'weight',
						'value' => '1234.5',
						'uom' => 'g',
					),
					'zone' => array(
						'id' => '1234',
						'name' => 'Example Zone',
					),
					'created_ts' => '2017-01-01',
					'updated_ts' => '2017-01-03',
				));
			});

			// Update Item
			$this->post('/{guid:[\w\.]+}', function($req, $res, $arg) {
				die('Update Inventory Item');
			});

			// Delete Item
			$this->delete('/{guid:[\w\.]+}', function($req, $res, $arg) {
				// First send a 202, Pending
				// Second send a 204, Deleted/No Content
				die('Update Inventory Item');
			});

		})->add($MWA);

		$this->group('/openthc', function() {

			// Plants
			$this->group('/v2016/plants', function() {

				// List of Plants
				$this->get('', function($req, $res, $arg) {
					// Apply Filter for SQL
					$ret = array();
					$ret[] = array(
						'guid' => '1234',
						'strain' => array(
							'name' => 'Blue Dream',
						),
						'zone' => array(
							'id' => '1234',
							'name' => 'Example Zone',
						),
						'planted_date' => '2017-01-01',
						'collections' => array(),
					);
					$ret[] = array(
						'guid' => '1235',
						'strain' => array(
							'name' => 'Blue Dream',
						),
						'zone' => array(
							'id' => '1234',
							'name' => 'Example Zone',
						),
						'planted_date' => '2017-01-01',
						'collections' => array(),
					);
					return $res->withJson($ret);
				});

				$this->post('/', function($req, $res, $arg) {
					die('Create Plants');
				});

				$this->get('/{guid:[\w\.]+}', function($req, $res, $arg) {
					//die('Select Plant Item');
					return $res->withJson(array(
						'guid' => $arg['guid'],
						'strain' => array(
							'name' => 'Blue Dream',
						),
						'zone' => array(
							'id' => '1234',
							'name' => 'Example Zone',
						),
						'planted_date' => '2017-01-01',
						'collections' => array(),
					));
				});

				/**
					Modify a Specific Plant
				*/
				$this->post('/{ulid:[0-9a-f]+}', function($req, $res, $arg) {
					return $res->withJson(array(
						'guid' => $arg['ulid'],
						'strain' => array(
							'name' => $_POST['strain'],
						),
						'zone' => array(
							'id' => '1234',
							'name' => $_POST['zone'],
						),
						'planted_date' => '2017-01-01',
						'collections' => array(),
					));
				});

			})->add($MWA);

			// Transport Details
			$this->group('/v2016/transfers', function() {

				$this->get('/', function($req, $res, $arg) {
					die('Search Transfers, All');
				});

				$this->get('/export', function($req, $res, $arg) {
					die('Search Transfers Inbound');
				});

				$this->get('/import', function($req, $res, $arg) {
					die('Search Transfers Outbound');
				});

			})->add($MWA);

			// Retail Sales
			$this->group('/v2016/sale', function() {

				$this->get('/', function($req, $res, $arg) {
					print_r($_POST);
					die('Search Retail Sales');
				});

				$this->post('/', function($req, $res, $arg) {
					print_r($_POST);
					die('Create Retail Sale');
				});

				$this->get('/{ulid:[0-9a-f]+}', function($req, $res, $arg) {
					print_r($_POST);
					die('Select Retail Sale Item');
				});

			})->add($MWA);

			// Configuration Stuffs
			$this->group('/v2016/config', function() {

				$this->get('/inventory/type', function($REQ, $RES, $ARG) {

					$ret = parse_ini_file('/opt/api.openthc.com/etc/kind.ini', true);

					return $RES->withJSON($ret);

				});

			});

		});


		///////////////
	}

}
