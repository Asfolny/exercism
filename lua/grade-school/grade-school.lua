local School = {}

function School:new()
  self.students = {}
  return self
end

function School:roster()
  table.sort(self.students)
  for grade, _ in pairs(self.students) do table.sort(self.students[grade]) end
  return self.students
end

function School:add(name, grade)
  if self.students[grade] then
    table.insert(self.students[grade], name)
  else
    self.students[grade] = { name }
  end
end

function School:grade(grade)
  if self.students[grade] then
    table.sort(self.students[grade])
  else
    self.students[grade] = {}
  end
  return self.students[grade]
end

return School