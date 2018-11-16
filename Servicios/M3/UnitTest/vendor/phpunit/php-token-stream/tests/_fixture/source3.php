<?php



include 'test1.php';
include_once 'test2.php';
require 'test3.php';
require_once 'test4.php';

$Vu3hop1t1gy3 = get_included_files();

foreach ($Vu3hop1t1gy3 as $Va3qqb0vgkhy) {
    echo "$Va3qqb0vgkhy\n";
}
