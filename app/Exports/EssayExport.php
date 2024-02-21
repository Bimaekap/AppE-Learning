<?php

namespace App\Exports;

use App\Models\Multiple;
use PhpParser\Node\Stmt\Return_;
use Maatwebsite\Excel\Concerns\FromCollection;

class EssayExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Multiple::all();
    }

}
