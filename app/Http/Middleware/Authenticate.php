<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Kiểm tra nếu request mong muốn nhận về JSON, không thực hiện redirect.
        if ($request->expectsJson()) {
            return null;
        }

        // Lấy URL hiện tại của request
        $currentUrl = $request->url();

        // Kiểm tra nếu URL hiện tại bắt đầu với '/admin'
        if (str_starts_with($currentUrl, route('admin.auth.login'))) {
            // Nếu đúng, redirect đến trang login của admin
            return route('admin.auth.login');
        } elseif (str_starts_with($currentUrl, route('auth.login'))) {
            // Nếu đúng, redirect đến trang login thông thường
            return route('auth.login');
        }

        // Mặc định, redirect đến trang login thông thường
        return route('auth.login');
    }
}
