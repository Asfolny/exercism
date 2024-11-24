export class GradeSchool {
  constructor() {
    this.students = {}
  }

  roster() {
    const ordered = Object.keys(this.students).sort().reduce(
      (obj, key) => {
        // Clone the array to prevent pushing to roster to affect internal state
        obj[key] = [...this.students[key]]
        return obj
      }, 
      {}
    )

    return ordered
  }

  add(name, grade) {
    if (this.students[grade] === undefined) {
      this.students[grade] = []
    }

    for (const whole_grade of Object.values(this.students)) {
      const idx = whole_grade.indexOf(name)
      if (idx > -1) {
        whole_grade.splice(idx, 1)
      }
    }

    this.students[grade].push(name)
    this.students[grade].sort()
  }

  grade(grade) {
    // Cloning the array to prevent pushes to affect the internal state
    return this.students[grade] ? [...this.students[grade]] : []
  }
}
