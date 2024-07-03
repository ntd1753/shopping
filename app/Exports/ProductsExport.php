<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Eager load các mối quan hệ category và brand
        return Product::with(['category', 'brand'])->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Category',
            'Barcode',
            'Name',
            'Slug',
            'Quantity',
            'Price',
            'Discount Percent',
            'Brand',
            'Created At',
            'Updated At'
        ];
    }
    public function map($product): array
    {
        return [
            $product->id,
            $product->category ? $product->category->name : 'N/A',
            $product->barcode,
            $product->name,
            $product->slug,
            $product->quantity,
            $product->price,
            $product->discount_persent,
            $product->brand ? $product->brand->name : 'N/A',
            $product->created_at,
            $product->updated_at
        ];
    }
}
