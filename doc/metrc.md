# Franwell/METRC Mock API Interface

A compatible interface for the API as defined by http://metrc.com/

## Usage

The BASE is `/metrc/v2015`


## Example

    curl \
        $HOST/metrc/v2015/facilities/v1 \
        -H "authorization: base64($VENDOR_KEY, $CLIENT_KEY)" \
        -H "content-type: application/json"


Use API calls as otherwise defined by METRC


 * CA Documentation: https://api-ca.metrc.com/Documentation
 * CO Documentation: https://api-co.metrc.com/Documentation
 * NV Documentation: https://api-nv.metrc.com/Documentation
 * OR Documentation: https://api-or.metrc.com/Documentation
