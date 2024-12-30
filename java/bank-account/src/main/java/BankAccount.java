class BankAccount {
    private boolean opened = false;
    private int balance = 0;

    void open() throws BankAccountActionInvalidException {
        synchronized(this) {
            if (opened) {
                throw new BankAccountActionInvalidException("Account already open");
            }

            this.balance = 0;
            this.opened = true;
        }
    }

    void close() throws BankAccountActionInvalidException {
        synchronized(this) {
            if (!opened) {
                throw new BankAccountActionInvalidException("Account not open");
            }

            this.opened = false;
        }
    }

    synchronized int getBalance() throws BankAccountActionInvalidException {
        synchronized(this) {
            if (!opened) {
                throw new BankAccountActionInvalidException("Account closed");
            }

            return this.balance;
        }
    }

    synchronized void deposit(int amount) throws BankAccountActionInvalidException {
        synchronized(this) {
            if (!opened) {
                throw new BankAccountActionInvalidException("Account closed");
            }

            if (amount < 0) {
                throw new BankAccountActionInvalidException("Cannot deposit or withdraw negative amount");
            }

            this.balance += amount;
        }
    }

    synchronized void withdraw(int amount) throws BankAccountActionInvalidException {
        synchronized(this) {
            if (!opened) {
                throw new BankAccountActionInvalidException("Account closed");
            }

            if (amount < 0) {
                throw new BankAccountActionInvalidException("Cannot deposit or withdraw negative amount");
            }

            if (amount > this.balance) {
                throw new BankAccountActionInvalidException("Cannot withdraw more money than is currently in the account");
            }

            this.balance -= amount;
        }
    }

}