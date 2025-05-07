<?php

namespace App\Exports;

use App\Models\Borrows;
use Maatwebsite\Excel\Concerns\FromCollection;

class BorrowsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Borrows::all();
    }
}
