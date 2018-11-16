<?php



class PHPUnit_Runner_Filter_Group_Include extends PHPUnit_Runner_Filter_GroupFilterIterator
{
    protected function doAccept($Vfrjid4vr3ci)
    {
        return in_array($Vfrjid4vr3ci, $this->groupTests);
    }
}
