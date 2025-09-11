#!/bin/bash
#
# Install Helper
#
# SPDX-License-Identifier: GPL-3.0-only
#

set -o errexit
set -o errtrace
set -o nounset
set -o pipefail

APP_ROOT=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )

cd "$APP_ROOT"

composer install --no-ansi --no-progress --classmap-authoritative

npm install --no-audit --no-fund

php <<PHP
<?php
define('APP_ROOT', __DIR__);
require_once(APP_ROOT . '/vendor/autoload.php');
\OpenTHC\Make::install_bootstrap();
\OpenTHC\Make::install_fontawesome();
\OpenTHC\Make::install_jquery();
PHP

# chown -R www-data:www-data ./webroot/img/contact
# chown -R www-data:www-data ./webroot/output
# chown -R www-data:www-data ./var
# mkdir -p webroot/img/company webroot/img/contact webroot/img/inventory webroot/output
# chown -R www-data:www-data webroot/img/company webroot/img/contact webroot/img/inventory webroot/output || true
