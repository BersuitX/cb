<?php


namespace SebastianBergmann\Diff\LCS;


class MemoryEfficientImplementationTest extends LongestCommonSubsequenceTest
{
    protected function createImplementation()
    {
        return new MemoryEfficientImplementation;
    }
}
