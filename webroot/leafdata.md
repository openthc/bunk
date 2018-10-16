# MJ Freeway/LeafData Mock API Interface

A mock interface for the API defined by https://leafdatasystems.com/
It's compatible with the WA interface.

## Usage

 * **$BASE** is /leafdata/v2018 which mocks https://watest.leafdatazone.com/api/v1

All API calls should work as expected.


## Example

	curl \
		$HOST/leafdata/v2018/areas \
		-H "X-MJF-Key: *$SECRET*" \
		-H "X-MJF-MME-Code: *$LICENSE_CODE*"


## Supported Objects

 * Area
 * Batch
 * Disposal
 * Inventory
 * Inventory Type
 * Inventory Adjustment
 * Inventory Transfer
 * Lab Result
 * MME
 * Plant
 * Sale
 * Strain
 * Tax
 * User


## Supported Actions

 * Inventory/Convert - /conversions/create
 * Disposal/Dispose - /disposals/dispose
 * Plant/Collect/Wet - /plants/harvest_plants
 * Plant/Collect/Dry - /batches/finish_lot
 * /inventory_transfers/api_in_transit
 * /move_inventory_to_plants
 * /move_plants_to_inventory
 * /inventory_transfers/api_receive
 * /split_inventory
