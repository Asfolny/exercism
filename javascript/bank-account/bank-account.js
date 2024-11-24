//
// This is only a SKELETON file for the 'Bank Account' exercise. It's been provided as a
// convenience to get you started writing code faster.
//

export class BankAccount {
  constructor() {
    this.opened = false
  }

  open() {
    if (this.opened === true) {
      throw new ValueError('Account already open')
    }

    this.money = 0
    this.opened = true
  }

  close() {
    if (this.opened === false) {
      throw new ValueError('Account not open')
    }

    this.opened = false
  }

  deposit(amount) {
    if (this.opened === false) {
      throw new ValueError('Account not open')
    }

    if (amount <= 0) {
      throw new ValueError('Cannot deposit less than 1')
    }

    this.money += amount
  }

  withdraw(amount) {
    if (this.opened === false) {
      throw new ValueError('Account not open')
    }

    if (amount <= 0) {
      throw new ValueError('Cannot withdraw less than 1')
    }

    if (amount > this.money) {
      throw new ValueError('Cannot withdraw more than balance')
    }

    this.money -= amount
  }

  get balance() {
    if (this.opened === false) {
      throw new ValueError('Account not open')
    }

    return this.money
  }
}

export class ValueError extends Error {
  constructor() {
    super('Bank account error');
  }
}
