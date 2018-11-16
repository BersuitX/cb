<?php
require_once 'PHP/CodeCoverage/Autoload.php';

$Vbt1bqdir3su = new PHP_CodeCoverage;
$Vgpt4we0cx0b   = $Vbt1bqdir3su->filter();

$Vgpt4we0cx0b->addFileToBlacklist(__FILE__);
$Vgpt4we0cx0b->addFileToBlacklist(dirname(__FILE__) . '/auto_append.php');

$Vbt1bqdir3su->start($_SERVER['SCRIPT_FILENAME']);
