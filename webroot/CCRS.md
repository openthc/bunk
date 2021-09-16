# LCB CCRS Mock API

This service provides data-upload validation for the CCRS defined CSV files by WSLCB.
See https://lcb.wa.gov/ccrs/ccrs for more information.

## Usage

 * **$BASE** is $HOST/ccrs/

```
POST /ccrs/section
Content-Type: text/csv

$CSV_DATA_HERE
```

```
curl $HOST/ccrs/$OBJECT \
	--request PUT \
	--header 'content-type: text/csv; charset=utf-8' \
	--data-binary @$CSV_FILE.csv
```


## Extended Data

Some responses will come with extended data, maybe useful for debugging.
They will all begin with an underscore prefix, *_detail* or or something.


## Supported Uploads

 * Area (/section)
 * Inventory (/lot)
 * Inventory Adjustment (/lot-adjust)
 * Inventory Transfer (/b2b)
 * Lab Test (/lab-result)
 * Plant (/crop)
 * Plant Destruction (/crop-destroy)
 * Plant Transfer (/b2b)
 * Product (/product)
 * Sale (/b2c)
 * Strain (/variety)
