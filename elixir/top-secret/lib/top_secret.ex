defmodule TopSecret do
  def to_ast(string) do
    Code.string_to_quoted!(string)
  end

  def decode_secret_message_part(ast, acc) when not is_tuple(ast), do: {ast, acc}
  def decode_secret_message_part(ast, acc) do
    type = elem(ast, 0)
    
    if type == :def or type == :defp do
      op_def = elem(ast, 2)
      |> Enum.at(0)

      # There may be guard clause first
      type = elem(op_def, 0)
      if type == :when do
        op_def = elem(op_def, 2)
        |> Enum.at(0)

        type = elem(op_def, 0)

        s = elem(op_def, 2)
        |> then(fn elem -> if elem == nil, do: [], else: elem end) # Elem is either nil or a list of arguments
        |> length()
  
        op = Atom.to_string(type)
        |> then(fn op -> if s > 0, do: String.slice(op, 0..s-1), else: "" end)
        
        {ast, [op | acc]}
      else
        s = elem(op_def, 2)
        |> then(fn elem -> if elem == nil, do: [], else: elem end) # Elem is either nil or a list of arguments
        |> length()
  
        op = Atom.to_string(type)
        |> then(fn op -> if s > 0, do: String.slice(op, 0..s-1), else: "" end)
        
        {ast, [op | acc]}
      end 
    else
      {ast, acc}
    end
  end

  def decode_secret_message(string) do
    to_ast(string)
    |> Macro.prewalk([], &decode_secret_message_part/2)
    |> elem(1)
    |> Enum.reverse()
    |> Enum.join("")
  end
end
