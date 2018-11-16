<?php



class BankAccountWithCustomExtensionTest extends PHPUnit_Framework_TestCase
{
    protected $Vajdexm0kxhp;

    protected function setUp()
    {
        $this->ba = new BankAccount;
    }

    
    public function testBalanceIsInitiallyZero()
    {
        $this->assertEquals(0, $this->ba->getBalance());
    }

    
    public function testBalanceCannotBecomeNegative()
    {
        try {
            $this->ba->withdrawMoney(1);
        } catch (BankAccountException $Vpt32vvhspnv) {
            $this->assertEquals(0, $this->ba->getBalance());

            return;
        }

        $this->fail();
    }

    
    public function testBalanceCannotBecomeNegative2()
    {
        try {
            $this->ba->depositMoney(-1);
        } catch (BankAccountException $Vpt32vvhspnv) {
            $this->assertEquals(0, $this->ba->getBalance());

            return;
        }

        $this->fail();
    }

    
    
}
