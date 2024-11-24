default_students = ["Alice", "Bob", "Charlie", "David", "Eve", "Fred", "Ginny", "Harriet", "Ileana", "Joseph", "Kincaid", "Larry"]

class Garden:
    def __init__(self, diagram, students=default_students):
        students.sort() # students must be sorted alphabetically
        self.students = students
        self.planted = {}

        for plantRow in diagram.split('\n'):
            student_index = 0
            handled = 0

            for plant in list(plantRow):
                student = self.students[student_index]

                if student not in self.planted:
                    self.planted[student] = []

                self.planted[student].append(self.get_plant(plant))
                handled += 1

                if handled == 2:
                    student_index += 1
                    handled = 0
    
    def plants(self, student):
        return self.planted[student]

    def get_plant(self, short):
        match short:
            case 'G':
                return 'Grass'
            case 'C':
                return 'Clover'
            case 'R':
                return 'Radishes'
            case 'V':
                return 'Violets'
