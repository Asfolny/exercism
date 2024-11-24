defmodule Username do
  def sanitize([]), do: []
  def sanitize(username) do
    [head | tail] = username
    sanitized = sanitize(tail)
    case head do
    head when head == ?_ -> [head | sanitized]
    head when head < ?a -> sanitized
    head when head <= ?z -> [head | sanitized]
    head when head == ?ä -> ~c"ae" ++ sanitized
    head when head == ?ö -> ~c"oe" ++ sanitized
    head when head == ?ü -> ~c"ue" ++ sanitized
    head when head == ?ß -> ~c"ss" ++ sanitized
    _ -> sanitized
    end
  end
end
