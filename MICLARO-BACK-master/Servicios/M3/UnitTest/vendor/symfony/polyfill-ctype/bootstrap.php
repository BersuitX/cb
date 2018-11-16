<?php



use Symfony\Polyfill\Ctype as p;

if (!function_exists('ctype_alnum')) {
    function ctype_alnum($Vlakcyq2pqgp) { return p\Ctype::ctype_alnum($Vlakcyq2pqgp); }
    function ctype_alpha($Vlakcyq2pqgp) { return p\Ctype::ctype_alpha($Vlakcyq2pqgp); }
    function ctype_cntrl($Vlakcyq2pqgp) { return p\Ctype::ctype_cntrl($Vlakcyq2pqgp); }
    function ctype_digit($Vlakcyq2pqgp) { return p\Ctype::ctype_digit($Vlakcyq2pqgp); }
    function ctype_graph($Vlakcyq2pqgp) { return p\Ctype::ctype_graph($Vlakcyq2pqgp); }
    function ctype_lower($Vlakcyq2pqgp) { return p\Ctype::ctype_lower($Vlakcyq2pqgp); }
    function ctype_print($Vlakcyq2pqgp) { return p\Ctype::ctype_print($Vlakcyq2pqgp); }
    function ctype_punct($Vlakcyq2pqgp) { return p\Ctype::ctype_punct($Vlakcyq2pqgp); }
    function ctype_space($Vlakcyq2pqgp) { return p\Ctype::ctype_space($Vlakcyq2pqgp); }
    function ctype_upper($Vlakcyq2pqgp) { return p\Ctype::ctype_upper($Vlakcyq2pqgp); }
    function ctype_xdigit($Vlakcyq2pqgp) { return p\Ctype::ctype_xdigit($Vlakcyq2pqgp); }
}
