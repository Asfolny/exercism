package KindergartenGarden;

use v5.40;

use Exporter qw<import>;
our @EXPORT_OK = qw<plants>;

sub plants ( $diagram, $student ) {
    my %plants = (
        C => 'clover',
        G => 'grass',
        R => 'radishes',
        V => 'violets',
    );

    my @students = qw(Alice Bob Charlie David Eve Fred Ginny Harriet Ileana Joseph Kincaid Larry);
    my ($offset) = grep { $students[$_] eq $student } (0.. @students-1);
    if (not defined $offset) {
        $offset = -1;
    } else {
        $offset *= 2;
    }

    my @res;
    for my $line (split /\n/, $diagram) {
        for my $i (0 .. 1) {
            my $plant = $plants{substr($line, $i + $offset, 1)};
            push @res, $plant;
        }
    }
    
    return \@res;
}

1;
