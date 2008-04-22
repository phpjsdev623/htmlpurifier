<?php

// release script
// PHP 5.0 only

if (php_sapi_name() != 'cli') {
    echo 'Release script cannot be called from web-browser.';
    exit;
}

if (!isset($argv[1])) {
    echo 
'php release.php [version]
    HTML Purifier release script
';
    exit;
}

$version = trim($argv[1]);

// Bump version numbers:

// ...in VERSION
file_put_contents('VERSION', $version);

// ...in NEWS
$date = date('Y-m-d');
$news_c = str_replace(
    $l = "$version, unknown release date",
    "$version, released $date",
    file_get_contents('NEWS'),
    $c
);
if (!$c) {
    echo 'Could not update NEWS, missing ' . $l . PHP_EOL;
    exit;
} elseif ($c > 1) {
    echo 'More than one release declaration in NEWS replaced' . PHP_EOL;
    exit;
}
file_put_contents('NEWS', $news_c);

// ...in Doxyfile
$doxyfile_c = preg_replace(
    '/(?<=PROJECT_NUMBER {9}= )[^\s]+/m', // brittle
    $version,
    file_get_contents('Doxyfile'),
    1, $c
);
if (!$c) {
    echo 'Could not update Doxyfile, missing PROJECT_NUMBER.' . PHP_EOL;
    exit;
}
file_put_contents('Doxyfile', $doxyfile_c);

// ...in HTMLPurifier.php
$htmlpurifier_c = file_get_contents('library/HTMLPurifier.php');
$htmlpurifier_c = preg_replace(
    '/HTML Purifier .+? - /',
    "HTML Purifier $version - ",
    $htmlpurifier_c,
    1, $c
);
if (!$c) {
    echo 'Could not update HTMLPurifier.php, missing HTML Purifier [version] header.' . PHP_EOL;
    exit;
}
$htmlpurifier_c = preg_replace(
    '/public \$version = \'.+?\';/',
    "public \$version = '$version';",
    $htmlpurifier_c,
    1, $c
);
if (!$c) {
    echo 'Could not update HTMLPurifier.php, missing var $version.' . PHP_EOL;
    exit;
}
file_put_contents('library/HTMLPurifier.php', $htmlpurifier_c);

$config_c = file_get_contents('library/HTMLPurifier/Config.php');
$config_c = preg_replace(
    '/public \$version = \'.+?\';/',
    "public \$version = '$version';",
    $config_c,
    1, $c
);
if (!$c) {
    echo 'Could not update Config.php, missing var $version.' . PHP_EOL;
    exit;
}
file_put_contents('library/HTMLPurifier/Config.php', $config_c);

passthru('php maintenance/flush.php');

echo "Review changes, write something in WHATSNEW, and then SVN commit with log 'Release $version.'" . PHP_EOL;

