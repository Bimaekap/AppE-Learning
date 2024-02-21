<?php

namespace App\Imports;

use App\Models\Lesson;
use App\Models\Multiple;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MultiplesImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
       foreach ($collection as $row) {
        $multiples = Multiple::create([
            'kalimat' => $row['kalimat'],
            'A' => $row['a'],
            'B' => $row['b'],
            'C' => $row['c'],
            'D' => $row['d'],
            'E' => $row['e'],
            'kunci' => $row['kunci'],
          
        ]);

        $multiples->lessons()->create([
            'lesson_id' => $row['lesson_id'],
        ]);

        $multiples->kelas()->create([
            'kelas_id' => $row['kelas_id'],
        ]);
       }
    } 

    
}
