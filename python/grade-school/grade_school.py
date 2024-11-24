class School:
    def __init__(self):
        self.students = {}
        self.students_added = []
        self.added_success = []

    def add_student(self, name, grade):
        if name in self.students_added:
            self.added_success.append(False)
            return

        if grade not in self.students:
            self.students[grade] = []

        self.students[grade].append(name)
        self.students[grade].sort()

        self.added_success.append(True)
        self.students_added.append(name)

    def roster(self):
        students = dict(sorted(self.students.items()))
        return [student for grade_num, grade in students.items() for student in grade]
                

    def grade(self, grade_number):
        return self.students[grade_number] if grade_number in self.students else []

    def added(self):
        return self.added_success
