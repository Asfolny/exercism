import gleam/dict.{type Dict}
import gleam/int
import gleam/list

pub type School {
  School(grades: Dict(String, Int))
}

pub fn create() -> School {
  School(grades: dict.new())
}

pub fn roster(school: School) -> List(String) {
  dict.to_list(school.grades)
  |> list.sort(fn(a, b) {
    case a, b {
      #(_, g1), #(_, g2) -> int.compare(g1, g2)
    }
  })
  |> list.map(fn(grade) { grade.0 })
}

pub fn add(
  to school: School,
  student student: String,
  grade grade: Int,
) -> Result(School, Nil) {
  case dict.has_key(school.grades, student) {
    False -> Ok(School(grades: dict.insert(school.grades, student, grade)))
    True -> Error(Nil)
  }
}

pub fn grade(school: School, desired_grade: Int) -> List(String) {
  dict.filter(school.grades, fn(_, grade) { grade == desired_grade })
  |> dict.to_list
  |> list.map(fn(grade) { grade.0 })
}