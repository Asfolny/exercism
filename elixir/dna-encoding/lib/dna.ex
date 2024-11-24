defmodule DNA do
  def encode_nucleotide(code_point) do
    case code_point do
      ?\s -> 0b0000
      ?A -> 0b0001
      ?C -> 0b0010
      ?G -> 0b0100
      ?T -> 0b1000
    end
  end

  def decode_nucleotide(encoded_code) do
    case encoded_code do
      0b0000 -> ?\s
      0b0001 -> ?A
      0b0010 -> ?C
      0b0100 -> ?G
      0b1000 -> ?T
    end
  end

  def encode(dna), do: do_encode(dna, <<>>)

  defp do_encode([], acc), do: acc
  defp do_encode([head | tail], acc), do: 
    do_encode(tail, <<acc::bits, encode_nucleotide(head)::4>>)

  def decode(dna), do: do_decode(dna, [])

  defp do_decode(<<>>, acc), do: reverse(acc)
  defp do_decode(<<head::4, tail::bits>>, acc), do:
    do_decode(tail, [decode_nucleotide(head) | acc])

  # reverse so decode is correct
  defp reverse(list) do
    do_reverse(list, [])
  end
  defp do_reverse([], acc), do: acc
  defp do_reverse([head | tail], acc), do: do_reverse(tail, [head | acc])
end
