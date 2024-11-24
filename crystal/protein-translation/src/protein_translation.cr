module ProteinTranslation
  def self.proteins(strand : String) : Array(String)
    proteins = [] of String
    return proteins if strand.size < 3

    (0..strand.size-1).step(by: 3) do |i|
      protein = strand[i..i+2]
      case protein
      when "AUG"
        proteins << "Methionine"
      when "UUU", "UUC"
        proteins << "Phenylalanine"
      when "UUA", "UUG"
        proteins << "Leucine"
      when "UCU", "UCC", "UCA", "UCG"
        proteins << "Serine"
      when "UAU", "UAC"
        proteins << "Tyrosine"
      when "UGU", "UGC"
        proteins << "Cysteine"
      when "UGG"
        proteins << "Tryptophan"
      when "UAA", "UAG", "UGA"
        break
      else
        raise ArgumentError.new("Invalid protein")
      end
    end

    proteins
  end
end
