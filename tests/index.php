<?php

// call one file using /?f=FileTest.php , see $test_files array for
// valid values

error_reporting(E_ALL);
define('HTMLPurifierTest', 1);

// wishlist: automated calling of this file from multiple PHP versions so we
// don't have to constantly switch around

// default settings (protect against register_globals)
$GLOBALS['HTMLPurifierTest'] = array();
$GLOBALS['HTMLPurifierTest']['PEAR'] = false; // do PEAR tests
$simpletest_location = 'simpletest/'; // reasonable guess

// load SimpleTest
@include '../test-settings.php'; // don't mind if it isn't there
require_once $simpletest_location . 'unit_tester.php';
require_once $simpletest_location . 'reporter.php';
require_once $simpletest_location . 'mock_objects.php';
require_once 'HTMLPurifier/SimpleTest/Reporter.php';

// load Debugger
require_once 'Debugger.php';

// load convenience functions
require_once 'generate_mock_once.func.php';
require_once 'path2class.func.php';

// initialize PEAR (optional)
if ( is_string($GLOBALS['HTMLPurifierTest']['PEAR']) ) {
    // if PEAR is true, we assume that there's no need to
    // add it to the path
    set_include_path($GLOBALS['HTMLPurifierTest']['PEAR'] . PATH_SEPARATOR .
        get_include_path());
}

// initialize and load HTML Purifier
set_include_path('../library' . PATH_SEPARATOR . get_include_path());
require_once 'HTMLPurifier.php';

// load tests
$test_files = array();
require 'test_files.php'; // populates $test_files array
sort($test_files); // for the SELECT
$GLOBALS['HTMLPurifierTest']['Files'] = $test_files; // for the reporter
$test_file_lookup = array_flip($test_files);

// determine test file
if (isset($_GET['f']) && isset($test_file_lookup[$_GET['f']])) {
    $GLOBALS['HTMLPurifierTest']['File'] = $_GET['f'];
} else {
    $GLOBALS['HTMLPurifierTest']['File'] = false;
}

// we can't use addTestFile because SimpleTest chokes on E_STRICT warnings
if ($test_file = $GLOBALS['HTMLPurifierTest']['File']) {
    
    $test = new GroupTest($test_file . ' - HTML Purifier');
    $path = 'HTMLPurifier/' . $test_file;
    require_once $path;
    $test->addTestClass(path2class($path));
    
} else {
    
    $test = new GroupTest('All Tests - HTML Purifier');

    foreach ($test_files as $test_file) {
        $path = 'HTMLPurifier/' . $test_file;
        require_once $path;
        $test->addTestClass(path2class($path));
    }
    
}

if (SimpleReporter::inCli()) $reporter = new TextReporter();
else $reporter = new HTMLPurifier_SimpleTest_Reporter('UTF-8');

$test->run($reporter);

?>
