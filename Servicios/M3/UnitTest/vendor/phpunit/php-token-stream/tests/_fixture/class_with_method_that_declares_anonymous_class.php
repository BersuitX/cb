<?php
interface foo {
}

class class_with_method_that_declares_anonymous_class
{
    public function method()
    {
        $Vgcvauwd5u5t = new class { public function foo() {} };
        $Vgcvauwd5u5t = new class{public function foo(){}};
        $Vgcvauwd5u5t = new class extends stdClass {};
        $Vgcvauwd5u5t = new class extends stdClass {};
        $Vgcvauwd5u5t = new class implements foo {};
    }
}
