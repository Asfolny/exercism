defmodule LogParser do
  def valid_line?(line) do
    String.match?(line, ~r/^\[DEBUG\]|\[INFO\]|\[WARNING\]|\[ERROR\]/)
  end
  
  def split_line(line) do
    String.split(line, ~r/<[~\*=-]*>/)
  end

  def remove_artifacts(line) do
    String.replace(line, ~r/end-of-line\d+/i, "")
  end

  def tag_with_user_name(line) do
    # Because user's name does not need to be a \w, and support for tabs...
    user_regex = ~r/User[\s|\t]*(.[^\s|\t]*)/u
    if not String.match?(line, user_regex) do
      line
    else
      user = Enum.at(Regex.run(user_regex, line), 1)
      "[USER] #{user} #{line}"
    end
  end
end
