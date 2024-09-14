<?php declare(strict_types=1);

class School
{
    public array $studentsToGrades = [];

    public function add(string $name, int $grade): void
    {
        $this->studentsToGrades[$name] = $grade;
    }

    public function grade(int $grade): array
    {
        $r = [];
        foreach($this->studentsToGrades as $student => $savedGrade) {
            if ($grade === $savedGrade) {
                $r[] = $student;
            }
        }

        return $r;
    }

    public function studentsByGradeAlphabetical(): array
    {
        $r = [];
        foreach($this->studentsToGrades as $student => $grade) {
            if (!isset($r[$grade])) {
                $r[$grade] = [];
            }

            $r[$grade][] = $student;
            sort($r[$grade]);
        }
        ksort($r);

        return $r;
    }
}
