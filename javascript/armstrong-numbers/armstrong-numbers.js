export const isArmstrongNumber = num =>
    [...`${num}`].reduce((sum, digit, _, { length }) =>
       sum + digit ** length, 0
    ) === num;
