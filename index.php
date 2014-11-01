<?php
use Crystal\Crystal;

include_once 'vendor/autoload.php';

$string  = ['you are an idiot', 'come on stupid idiot'];
$rules   = ['idiot' => 'nice', 'stupid' => 'smart'];
$Crystal = new Crystal($rules);

var_dump($Crystal->clear($string));