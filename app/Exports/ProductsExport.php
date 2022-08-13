<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name',
        'cat_id',
        'supplier_id',
        'product_code',
        'product_place',
        'product_route',
        'product_image',
        'buy_date',
        'expire_date',
        'buying_price',
        'sale_price',
        'product_des')->get();
    }


}
