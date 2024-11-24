class BankAccount:
    def __init__(self):
        self.opened = False

    def get_balance(self):
        if self.opened == False:
            raise ValueError('account not open')

        return self.balance

    def open(self):
        if self.opened == True:
            raise ValueError('account already open')

        self.balance = 0
        self.opened = True

    def deposit(self, amount):
        if self.opened == False:
            raise ValueError('account not open')
        if amount <= 0:
            raise ValueError('amount must be greater than 0')

        self.balance += amount

    def withdraw(self, amount):
        if self.opened == False:
            raise ValueError('account not open')
        if amount > self.balance:
            raise ValueError('amount must be less than balance')
        if amount <= 0:
            raise ValueError('amount must be greater than 0')

        self.balance -= amount

    def close(self):
        if self.opened == False:
            raise ValueError('account not open')

        self.opened = False
