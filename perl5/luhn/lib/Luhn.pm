package Luhn;

use strict;
use warnings;
use v5.40;

use Exporter qw<import>;
our @EXPORT_OK = qw<is_luhn_valid>;

sub is_luhn_valid ($number) {    
    my $sum = 0;
    $number =~ s/ //g;
    $number = reverse($number);
    
    if ($number =~ /^0$/ || $number =~ /\D/) {
        return "";
    }

    for (my $i = 1; $i < length($number); $i += 2) {
        my $num = substr($number, $i, 1);
        $num += $num;

        if ($num > 9) {
            $num -= 9;
        }

        substr($number, $i, 1, $num);
    }

    for (my $i = 0; $i < length($number); $i += 1) {
        $sum += substr($number, $i, 1);
    }

    return $sum % 10 == 0;
}

1;
