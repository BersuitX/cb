<?php


namespace SebastianBergmann\Diff\LCS;


class TimeEfficientImplementationTest extends LongestCommonSubsequenceTest
{
    protected function createImplementation()
    {
        return new TimeEfficientImplementation;
    }
}
