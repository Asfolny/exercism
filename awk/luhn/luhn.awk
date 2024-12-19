$0 ~ /^ *[0-9] *$|[^0-9 ]/ {
    print "false";
    exit 0;
}

{
    gsub("[[:space:]]+", "", $0);
    for(i=length; i > 0; i--)
        x=(x substr($0, i, 1));

    sum = 0
    alt = 2

    for(i=2; i <= length(x); i += 2) {
        num = substr(x, i, 1);
        num += num;
        if (num > 9)
            num -= 9;

        if (i < length(x)) {
            x = substr(x, 1, i-1) num substr(x, i+1, length(x))
        } else {
            x = substr(x, 1, i-1) num
        }
    }

    for (i=1; i <= length(x); i++)
        sum += substr(x, i, 1);

    if (sum % 10 == 0) {
        print "true";
    } else {
        print "false";
    }
    exit 0;
}
