<?php declare(strict_types=1);

class BankAccount
{
    public function __construct(public int $balance = 0, private bool $open = false) {}
    public function open()
    {
        if ($this->open)
            throw new Exception("account already open");
        $this->open = true;
        $this->balance = 0;
    }

    public function close()
    {
        if (!$this->open)
            throw new Exception("account not open");
        $this->open = false;
    }

    public function balance(): int
    {
        if (!$this->open)
            throw new Exception("account not open");

        return $this->balance;
    }

    public function deposit(int $amt)
    {
        if (!$this->open)
            throw new Exception("account not open");
        if ($amt < 0)
            throw new InvalidArgumentException("amount must be greater than 0");

        $this->balance += $amt;
    }

    public function withdraw(int $amt)
    {
        if (!$this->open)
            throw new Exception("account not open");
                if ($amt < 0)
            throw new InvalidArgumentException("amount must be greater than 0");

        if ($this->balance < $amt)
            throw new InvalidArgumentException("amount must be less than balance");

        $this->balance -= $amt;
    }
}
