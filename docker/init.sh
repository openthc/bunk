#!/bin/bash
#
#

set -o errexit
set -o errtrace
set -o nounset
set -o pipefail



# Start Regular Way
exec /usr/sbin/apache2 -DFOREGROUND
