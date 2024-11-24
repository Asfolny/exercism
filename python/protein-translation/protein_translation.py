def proteins(strand):
    proteins = []

    if len(strand) % 3 != 0:
        raise Exception("Not a valid strand")

    for i in range(0, len(strand), 3):
        protein = strand[i:i+3]
        match protein:
            case "AUG":
                proteins.append("Methionine")
            case "UUU" | "UUC":
                proteins.append("Phenylalanine")
            case "UUA" | "UUG":
                proteins.append("Leucine")
            case "UCU" | "UCC" | "UCA" | "UCG":
                proteins.append("Serine")
            case "UAU" | "UAC":
                proteins.append("Tyrosine")
            case "UGU" | "UGC":
                proteins.append("Cysteine")
            case "UGG":
                proteins.append("Tryptophan")
            case "UAA" | "UAG" | "UGA":
                break

    return proteins