<?php

namespace App\Imports;

use App\Models\Borrows;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBorrows implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Borrows([
            'user_id' => $row[0],
            'item_id' => $row[1],
            'status' => $row[2],
            'is_approved' => $row[3],
            'borrow_date' => $row[4],
            'purposes' => $row[5],
            'quantity' => $row[6],
        ]);
    }
}
