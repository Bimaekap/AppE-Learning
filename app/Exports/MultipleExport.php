<?php

namespace App\Exports;

use App\Models\Multiple;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class MultipleExport implements FromCollection,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
     return new Collection([
        ['kalimat','A','B','C','D','E','kunci'],
     ]);

    }
}
