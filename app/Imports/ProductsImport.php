<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Validators\Failure;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading, SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        $category = Category::firstOrCreate(['name' => $row['category']]);
        $brand = Brand::firstOrCreate(['name' => $row['brand']]);

        // Tạo sản phẩm
        $product = Product::create([
            'category_id'      => $category->id,
            'barcode'          => $row['barcode'],
            'name'             => $row['name'],
            'slug'             => Str::slug($row['name']),
            'description'      => $row['description'],
            'quantity'         => $row['quantity'],
            'price'            => $row['price'],
            'discount_persent' => $row['discount_percent']?? 0,
            'brand_id'         => $brand->id,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        // Xử lý hình ảnh
        $imagePaths = explode(',', $row['image_path']);
        foreach ($imagePaths as $path) {
            if ($this->isValidImage($path)) {
                Image::create([
                    'model_type' => 'App\Models\Product',
                    'model_id'   => $product->id,
                    'path'       => $path,
                    'name'       => basename($path),
                    'alt'        => $product->name,
                ]);
            }
        }

        return $product;
    }

    public function rules(): array
    {
        return [
            '*.category'        => 'required|string',
            '*.barcode'         => 'required|string|unique:products,barcode',
            '*.name'            => 'required|string',
            '*.description'     => 'required|string',
            '*.quantity'        => 'required|integer|min:1',
            '*.price'           => 'required|numeric|min:0',
            '*.discount_percent'=> 'nullable|numeric|min:0|max:100',
            '*.brand'           => 'required|string',
            '*.image_path'      => 'required|string', // Có thể thêm xác thực cho đường dẫn ảnh
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * Kiểm tra tính hợp lệ của đường dẫn ảnh.
     *
     * @param string $path
     * @return bool
     */
    private function isValidImage(string $path): bool
    {
        // Kiểm tra nếu đường dẫn là URL
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return true;
        }

        // Kiểm tra nếu đường dẫn là file trong hệ thống
        if (File::exists($path) && exif_imagetype($path)) {
            return true;
        }

        return false;
    }
}
