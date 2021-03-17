<?php

namespace App\Imports;

use App\Models\ImportProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportProduct([
            'company'=> $row['company'],
            'category'=> $row['category'],
            'generic'=> $row['generic'],
            'strength'=> $row['strength'],
            'product'=> $row['product']
        ]);
    }
}
