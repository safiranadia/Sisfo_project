<?php

namespace App\Exports;

use App\Models\Returns;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Returns::all();
    }
}
