unit module PhoneNumber;

constant @errors = (
   '11 digits must start with 1',
   'must not be greater than 11 digits',
   'must not be fewer than 10 digits',
   'letters not permitted',
   'punctuations not permitted',
   'area code cannot start with zero',
   'area code cannot start with one',
   'exchange code cannot start with zero',
   'exchange code cannot start with one',
);

sub clean-number ($_) is export {
    fail @errors[3] if /<:Letter>/;
    fail @errors[4] if /<-[ 0..9 \- ( ) . + \s ]>/;
    my @digits = m:g/\d/;
    if @digits == 11 {
        fail @errors[0] unless @digits[0] == 1;
        @digits .= skip;
    }
    fail @errors[1] if @digits > 11;
    fail @errors[2] if @digits < 10;
    fail @errors[5] if @digits[0] == 0;
    fail @errors[6] if @digits[0] == 1;
    fail @errors[7] if @digits[3] == 0;
    fail @errors[8] if @digits[3] == 1;
    @digits.join
}