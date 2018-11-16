<?php



abstract class PHP_CodeCoverage_TestCase extends PHPUnit_Framework_TestCase
{
    protected function getXdebugDataForBankAccount()
    {
        return array(
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
                    8  => 1,
                    9  => -2,
                    13 => -1,
                    14 => -1,
                    15 => -1,
                    16 => -1,
                    18 => -1,
                    22 => -1,
                    24 => -1,
                    25 => -2,
                    29 => -1,
                    31 => -1,
                    32 => -2
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    29 => 1,
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
                    8  => 1,
                    13 => 1,
                    16 => 1,
                    22 => 1,
                )
            ),
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array(
                    8  => 1,
                    13 => 1,
                    14 => 1,
                    15 => 1,
                    18 => 1,
                    22 => 1,
                    24 => 1,
                    29 => 1,
                    31 => 1,
                )
            )
        );
    }

    protected function getCoverageForBankAccount()
    {
        $Vqhzkfsafzrc = $this->getXdebugDataForBankAccount();

        $Vaafq2jgpind = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $Vaafq2jgpind->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $Vqhzkfsafzrc[0],
                $Vqhzkfsafzrc[1],
                $Vqhzkfsafzrc[2],
                $Vqhzkfsafzrc[3]
            ));

        $Vbt1bqdir3su = new PHP_CodeCoverage($Vaafq2jgpind, new PHP_CodeCoverage_Filter);

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
            true
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
        );

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $Vbt1bqdir3su->start(
            new BankAccountTest('testDepositWithdrawMoney')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
            )
        );

        return $Vbt1bqdir3su;
    }

    protected function getCoverageForBankAccountForFirstTwoTests()
    {
        $Vqhzkfsafzrc = $this->getXdebugDataForBankAccount();

        $Vaafq2jgpind = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $Vaafq2jgpind->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $Vqhzkfsafzrc[0],
                $Vqhzkfsafzrc[1]
            ));

        $Vbt1bqdir3su = new PHP_CodeCoverage($Vaafq2jgpind, new PHP_CodeCoverage_Filter);

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceIsInitiallyZero'),
            true
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(6, 9))
        );

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceCannotBecomeNegative')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(27, 32))
        );

        return $Vbt1bqdir3su;
    }

    protected function getCoverageForBankAccountForLastTwoTests()
    {
        $Vqhzkfsafzrc = $this->getXdebugDataForBankAccount();

        $Vaafq2jgpind = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $Vaafq2jgpind->expects($this->any())
            ->method('stop')
            ->will($this->onConsecutiveCalls(
                $Vqhzkfsafzrc[2],
                $Vqhzkfsafzrc[3]
            ));

        $Vbt1bqdir3su = new PHP_CodeCoverage($Vaafq2jgpind, new PHP_CodeCoverage_Filter);

        $Vbt1bqdir3su->start(
            new BankAccountTest('testBalanceCannotBecomeNegative2')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(TEST_FILES_PATH . 'BankAccount.php' => range(20, 25))
        );

        $Vbt1bqdir3su->start(
            new BankAccountTest('testDepositWithdrawMoney')
        );

        $Vbt1bqdir3su->stop(
            true,
            array(
                TEST_FILES_PATH . 'BankAccount.php' => array_merge(
                    range(6, 9),
                    range(20, 25),
                    range(27, 32)
                )
            )
        );

        return $Vbt1bqdir3su;
    }

    protected function getExpectedDataArrayForBankAccount()
    {
        return array(
            TEST_FILES_PATH . 'BankAccount.php' => array(
                8 => array(
                    0 => 'BankAccountTest::testBalanceIsInitiallyZero',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                9  => null,
                13 => array(),
                14 => array(),
                15 => array(),
                16 => array(),
                18 => array(),
                22 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative2',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                24 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney',
                ),
                25 => null,
                29 => array(
                    0 => 'BankAccountTest::testBalanceCannotBecomeNegative',
                    1 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                31 => array(
                    0 => 'BankAccountTest::testDepositWithdrawMoney'
                ),
                32 => null
            )
        );
    }

    protected function getCoverageForFileWithIgnoredLines()
    {
        $Vbt1bqdir3su = new PHP_CodeCoverage(
            $this->setUpXdebugStubForFileWithIgnoredLines(),
            new PHP_CodeCoverage_Filter
        );

        $Vbt1bqdir3su->start('FileWithIgnoredLines', true);
        $Vbt1bqdir3su->stop();

        return $Vbt1bqdir3su;
    }

    protected function setUpXdebugStubForFileWithIgnoredLines()
    {
        $Vaafq2jgpind = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $Vaafq2jgpind->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_ignore.php' => array(
                        2 => 1,
                        4 => -1,
                        6 => -1,
                        7 => 1
                    )
                )
            ));

        return $Vaafq2jgpind;
    }

    protected function getCoverageForClassWithAnonymousFunction()
    {
        $Vbt1bqdir3su = new PHP_CodeCoverage(
            $this->setUpXdebugStubForClassWithAnonymousFunction(),
            new PHP_CodeCoverage_Filter
        );

        $Vbt1bqdir3su->start('ClassWithAnonymousFunction', true);
        $Vbt1bqdir3su->stop();

        return $Vbt1bqdir3su;
    }

    protected function setUpXdebugStubForClassWithAnonymousFunction()
    {
        $Vaafq2jgpind = $this->getMock('PHP_CodeCoverage_Driver_Xdebug');
        $Vaafq2jgpind->expects($this->any())
            ->method('stop')
            ->will($this->returnValue(
                array(
                    TEST_FILES_PATH . 'source_with_class_and_anonymous_function.php' => array(
                        7  => 1,
                        9  => 1,
                        10 => -1,
                        11 => 1,
                        12 => 1,
                        13 => 1,
                        14 => 1,
                        17 => 1,
                        18 => 1
                    )
                )
            ));

        return $Vaafq2jgpind;
    }
}
