<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['roll_no']) && empty($row['email']) && empty($row['phone'])) {
                continue;
            }

            // Check karein ki Roll No, Email ya Phone mein se koi bhi match hota hai kya
            $student = Student::where('roll_no', $row['roll_no'] ?? null)
                ->orWhere('email', $row['email'] ?? null)
                ->orWhere('phone', $row['phone'] ?? null)
                ->first();

            if ($student) {
                // Agar student mil gaya toh details update kar do
                $student->update([
                    'roll_no'      => $row['roll_no'] ?? $student->roll_no,
                    'name'         => $row['name'] ?? $student->name,
                    'email'        => $row['email'] ?? $student->email,
                    'phone'        => $row['phone'] ?? $student->phone,
                    'degree'       => $row['degree'] ?? $student->degree,
                    'branch'       => $row['branch'] ?? $student->branch,
                    'passing_year' => $row['passing_year'] ?? $row['passingyear'] ?? $student->passing_year,
                ]);
            } else {
                // Agar naya student hai toh insert kar do
                Student::create([
                    'roll_no'      => $row['roll_no'],
                    'name'         => $row['name'] ?? null,
                    'email'        => $row['email'] ?? null,
                    'phone'        => $row['phone'] ?? null,
                    'degree'       => $row['degree'] ?? null,
                    'branch'       => $row['branch'] ?? null,
                    'passing_year' => $row['passing_year'] ?? $row['passingyear'] ?? null,
                ]);
            }
        }
    }
}