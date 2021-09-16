# LCB CCRS Mock API

This service provides data-upload validation for the CCRS defined CSV files by WSLCB.
No information is sent to the LCB, none of the uploaded data is saved anyhere beyond the evaluation of the upload.

See https://lcb.wa.gov/ccrs/ccrs for more information.

## Usage

 * **$BASE** is $HOST/ccrs/

The HTTP request looks like this minimal example.
Just post the CSV directly as the body.

```
POST /ccrs/section
Content-Type: text/csv

$CSV_DATA_HERE
```

From curl it might look like this:

```
curl $HOST/ccrs/$OBJECT \
	--request POST \
	--header 'content-type: text/csv; charset=utf-8' \
	--data-binary @$CSV_FILE.csv
```

And if you want to evaluate a file name for the upload, add it in the query string

```
curl '$HOST/ccrs/section?name=area_123456_20210908162000.csv' \
	--request POST \
	--header 'content-type: text/csv; charset=utf-8' \
	--data-binary @Area.csv
```


## Extended Data

Some responses will come with extended data, maybe useful for debugging.
They will all begin with an underscore prefix, *_detail* or or something.


## Supported Uploads

 * Area (/section)
 * Product (/product)
 * Strain (/variety)
 * Inventory (/lot)
 * Inventory Adjustment (/lot-adjust)
 * Plant (/crop)
 * Plant Destruction (/crop-destroy)
 * Lab Test (/lab-result)
 * B2B Sale (/b2b-sale)
 * B2B Transfer Inventory (/b2b-lot)
 * B2B Transfer Plant (/b2b-crop)
 * B2C Sale (/b2c)
