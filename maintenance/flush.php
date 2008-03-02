#!/usr/bin/php
<?php

chdir(dirname(__FILE__));
require_once 'common.php';
assertCli();

/**
 * @file
 * Runs all generation/flush cache scripts to ensure that somewhat volatile
 * generated files are up-to-date.
 */

function e($cmd) {
    echo "\$ $cmd\n";
    passthru($cmd);
    echo "\n";
}

e('php generate-includes.php');
e('php flush-definition-cache.php');
e('php generate-schema-cache.php');
e('php generate-standalone.php');
