export const toRna = (dna_strand) => {
  let rna_strand = ''

  for (const char of dna_strand.split('')) {
    switch(char) {
      case 'G':
        rna_strand += 'C'
        continue
      case 'C':
        rna_strand += 'G'
        continue
      case 'T':
        rna_strand += 'A'
        continue
      case 'A':
        rna_strand += 'U'
        continue
    }
  }

  return rna_strand
}
