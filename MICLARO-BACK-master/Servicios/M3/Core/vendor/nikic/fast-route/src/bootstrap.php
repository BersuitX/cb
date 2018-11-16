<?php

namespace FastRoute;

require __DIR__ . '/functions.php';

spl_autoload_register(function ($Vqmu1sajhgfn) {
    if (strpos($Vqmu1sajhgfn, 'FastRoute\\') === 0) {
        $Vgpjmw221p0b = substr($Vqmu1sajhgfn, strlen('FastRoute'));
        require __DIR__ . strtr($Vgpjmw221p0b, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});
