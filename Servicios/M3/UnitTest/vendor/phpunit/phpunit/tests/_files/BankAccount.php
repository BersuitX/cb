<?php


class BankAccountException extends RuntimeException
{
}


class BankAccount
{
    
    protected $V1ajn42qznny = 0;

    
    public function getBalance()
    {
        return $this->balance;
    }

    
    protected function setBalance($V1ajn42qznny)
    {
        if ($V1ajn42qznny >= 0) {
            $this->balance = $V1ajn42qznny;
        } else {
            throw new BankAccountException;
        }
    }

    
    public function depositMoney($V1ajn42qznny)
    {
        $this->setBalance($this->getBalance() + $V1ajn42qznny);

        return $this->getBalance();
    }

    
    public function withdrawMoney($V1ajn42qznny)
    {
        $this->setBalance($this->getBalance() - $V1ajn42qznny);

        return $this->getBalance();
    }
}
