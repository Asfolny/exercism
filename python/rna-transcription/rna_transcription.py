def to_rna(dna_strand):
    rna_strand = ""

    for char in list(dna_strand):
        match char:
            case 'G':
                rna_strand += 'C'
            case 'C':
                rna_strand += 'G'
            case 'T':
                rna_strand += 'A'
            case 'A':
                rna_strand += 'U'
                
    return rna_strand
