<?php
class MethodCallback
{
    public static function staticCallback()
    {
        $Veox3iprl5oz = func_get_args();

        if ($Veox3iprl5oz == array('foo', 'bar')) {
            return 'pass';
        }
    }

    public function nonStaticCallback()
    {
        $Veox3iprl5oz = func_get_args();

        if ($Veox3iprl5oz == array('foo', 'bar')) {
            return 'pass';
        }
    }
}
