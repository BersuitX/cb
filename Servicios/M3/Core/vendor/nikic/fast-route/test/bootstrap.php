<?php

require_once __DIR__ . '/../src/functions.php';

spl_autoload_register(function ($Vqmu1sajhgfn) {
    if (strpos($Vqmu1sajhgfn, 'FastRoute\\') === 0) {
        $Vb3iift025ov = strcasecmp(substr($Vqmu1sajhgfn, -4), 'Test') ? 'src/' : 'test/';
        $Vgpjmw221p0b = substr($Vqmu1sajhgfn, strlen('FastRoute'));
        require __DIR__ . '/../' . $Vb3iift025ov . strtr($Vgpjmw221p0b, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});
