import gleam/string

pub fn message(log_line: String) -> String {
  case string.split(log_line, on: ":") {
    [_, msg] -> string.trim(msg)
    _ -> ""
  }
}

pub fn log_level(log_line: String) -> String {
  case string.split(log_line, on: ":") {
    [level, _] ->
      level 
      |> string.replace(each: "]", with: "")
      |> string.replace(each: "[", with: "")
      |> string.lowercase()
      |> string.trim()
    _ -> ""
  }
}

pub fn reformat(log_line: String) -> String {
  string.concat([message(log_line), " ", "(", log_level(log_line), ")"])
}
