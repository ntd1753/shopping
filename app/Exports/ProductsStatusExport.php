<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsStatusExport implements FromCollection, WithHeadings
{
    protected $statuses;

    public function __construct(array $statuses)
    {
        $this->statuses = $statuses;
    }

    public function collection()
    {
        return collect($this->statuses);
    }

    public function headings(): array
    {
        // Lấy tiêu đề từ hàng đầu tiên trong $statuses
        if (!empty($this->statuses)) {
            $headings = array_keys($this->statuses[0]);
            return $headings;
        }

        return [
            'Category', 'Barcode', 'Name', 'Description', 'Quantity', 'Price', 'Discount Percent', 'Brand', 'Image Path', 'Status'
        ];
    }
}

