unit module SecretHandshake;

sub handshake ( $number ) is export {
    my @code;

    if ($number +& 1) != 0 {
        push @code, "wink";
    }

    if ($number +& 2) != 0 {
        push @code, "double blink";
    }

    if ($number +& 4) != 0 {
        push @code, "close your eyes";
    }

    if ($number +& 8) != 0 {
        push @code, "jump";
    }

    if ($number +& 16) != 0 {
        @code = @code.reverse;
    }

    return @code;
}
