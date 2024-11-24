const DEFAULT_STUDENTS = [
  'Alice',
  'Bob',
  'Charlie',
  'David',
  'Eve',
  'Fred',
  'Ginny',
  'Harriet',
  'Ileana',
  'Joseph',
  'Kincaid',
  'Larry'
]

const PLANT_CODES = {
  G: 'grass',
  V: 'violets',
  R: 'radishes',
  C: 'clover'
}

export class Garden {
  constructor(diagram, students = DEFAULT_STUDENTS) {
    students.sort()
    this.students = students
    this.planted = {}

    for (const row of diagram.split('\n')) {
      let handled = 0
      let student_index = 0

      for (const plant of row.split('')) {
        const student = this.students[student_index]

        if (!(student in this.planted)) {
          this.planted[student] = []
        }

        this.planted[student].push(PLANT_CODES[plant])
        handled++

        if (handled == 2) {
          handled = 0
          student_index++
        }
      }
    }
  }

  plants(student) {
    return this.planted[student]
  }
}