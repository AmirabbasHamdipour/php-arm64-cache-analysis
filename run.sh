#!/bin/bash
echo "Running PHP benchmark on $(php -r 'echo php_uname("m");')"
php benchmark.php
