<?php



spl_autoload_register(
    function($Vqmu1sajhgfn) {
        static $Vqmu1sajhgfnes = null;
        if ($Vqmu1sajhgfnes === null) {
            $Vqmu1sajhgfnes = array(
                'sebastianbergmann\\comparator\\arraycomparatortest' => '/ArrayComparatorTest.php',
                'sebastianbergmann\\comparator\\author' => '/_files/Author.php',
                'sebastianbergmann\\comparator\\book' => '/_files/Book.php',
                'sebastianbergmann\\comparator\\classwithtostring' => '/_files/ClassWithToString.php',
                'sebastianbergmann\\comparator\\datetimecomparatortest' => '/DateTimeComparatorTest.php',
                'sebastianbergmann\\comparator\\domnodecomparatortest' => '/DOMNodeComparatorTest.php',
                'sebastianbergmann\\comparator\\doublecomparatortest' => '/DoubleComparatorTest.php',
                'sebastianbergmann\\comparator\\exceptioncomparatortest' => '/ExceptionComparatorTest.php',
                'sebastianbergmann\\comparator\\factorytest' => '/FactoryTest.php',
                'sebastianbergmann\\comparator\\mockobjectcomparatortest' => '/MockObjectComparatorTest.php',
                'sebastianbergmann\\comparator\\numericcomparatortest' => '/NumericComparatorTest.php',
                'sebastianbergmann\\comparator\\objectcomparatortest' => '/ObjectComparatorTest.php',
                'sebastianbergmann\\comparator\\resourcecomparatortest' => '/ResourceComparatorTest.php',
                'sebastianbergmann\\comparator\\sampleclass' => '/_files/SampleClass.php',
                'sebastianbergmann\\comparator\\scalarcomparatortest' => '/ScalarComparatorTest.php',
                'sebastianbergmann\\comparator\\splobjectstoragecomparatortest' => '/SplObjectStorageComparatorTest.php',
                'sebastianbergmann\\comparator\\struct' => '/_files/Struct.php',
                'sebastianbergmann\\comparator\\testclass' => '/_files/TestClass.php',
                'sebastianbergmann\\comparator\\testclasscomparator' => '/_files/TestClassComparator.php',
                'sebastianbergmann\\comparator\\typecomparatortest' => '/TypeComparatorTest.php'
            );
        }
        $V2nl5qmj25jk = strtolower($Vqmu1sajhgfn);
        if (isset($Vqmu1sajhgfnes[$V2nl5qmj25jk])) {
            require __DIR__ . $Vqmu1sajhgfnes[$V2nl5qmj25jk];
        }
    }
);

