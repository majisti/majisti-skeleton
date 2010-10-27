<?php

$settings = array('majisti' => array(
    'app' => array(
        'namespace' => 'MajistiT',
        'env'       => 'development',
    ),
    'lib'       => array(
        'majisti' => 'majistip-0.4.0alpha2/libraries',
    ),
    'url' => array(
        'production' => 'http://static.majisti.com'
    )
));

require_once 'application/Loader.php';
$appLoader = new \Majisti\Application\Loader($settings);

unset($settings);
