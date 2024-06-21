<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ConfigController extends Controller
{
    function edit()
    {
        return view('admin.content.config.edit');
    }
     function update(Request $request)
    {

        // Đọc nội dung file cấu hình hiện tại
        $configPath = config_path('website.php');
        $config = include $configPath;

        // Cập nhật cấu hình với dữ liệu mới
        $config['company_name'] = $request->input('company_name');
        $config['business_registration'] = [
            'tax_code' => $request->input('tax_code'),
            'issued_by' => $request->input('issued_by'),
            'issued_date' => $request->input('issued_date'),
        ];
        $config['contact'] = [
            'hotline' => $request->input('hotline'),
            'email' => $request->input('email'),
            'zalo' => $request->input('zalo'),
            'description' =>  $request->input('description'),
        ];
        $config['social_links'] = [
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
        ];

        // Chuyển đổi mảng cấu hình thành chuỗi PHP
        $configString = "<?php\n\nreturn " . var_export($config, true) . ";\n";

        // Ghi nội dung mới vào file cấu hình
        File::put($configPath, $configString);
        Artisan::call('config:cache');

        return redirect()->route('admin.config.edit')->with('success', 'Configuration updated successfully.');
    }
}
